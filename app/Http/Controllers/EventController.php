<?php

namespace App\Http\Controllers;

use App\BookingRegistraion;
use App\Event;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Image;
use DB;
use App\Datatables\BookingRegistraionDataTable;
// use Maatwebsite\Excel\Facades\Excel;
use PDF;
// use App\Exports\UsersExport;

class EventController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
    $this->middleware('verified');
    $this->middleware('checkrole');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.add_event');
    }

    //event booked list for pdf start
    public function event_booked_list(BookingRegistraionDataTable $event_data, Request $request)

    {
      // search by date start
         // if(request()->ajax())
         // {
         //  if(!empty($request->from_date))
         //  {
         //   $data = DB::table('booking_registraions')
         //     ->whereBetween('created_at', array($request->from_date, $request->to_date))
         //     ->get();
         //  }
         //  else
         //  {
         //   $data = DB::table('booking_registraions')
         //     ->get();
         //  }
         //  return datatables()->of($data)->make(true);
         // }
// search by date end
      return $request->isMethod('post') ? $this->store($request) : $event_data->render('dashboard.event_booked_list');

    }

    //event booked list for pdf end

    function event_comming_and_finished(){
      $up_comming_events = BookingRegistraion::where('published_at', '>=', Carbon::now()->format('Y-m-d'))->where('cancel', '0')->get();
      $finished_events = BookingRegistraion::where('published_at', '<', Carbon::now()->format('Y-m-d'))->where('cancel', '0')->get();
      return view('dashboard.comming_and_finished_event',compact('up_comming_events','finished_events'));
    }

    public function create()
    {

    }
    public function event_show()
    {
        $event_lists = Event::all();
      return view('dashboard.show_events', compact('event_lists'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $create_new_event = Event::create([
          'events_title'   =>$request->events_title,
          'events_details' =>$request->events_details,
          'events_photo' =>'anika.jpg',
          'created_at'     =>Carbon::now()
        ]);

        //upload photo

        if($request->hasFile('events_photo')){
          $upload_event_photo = $request->file('events_photo');
          $event_photo_name = $create_new_event->id.".".$upload_event_photo->extension();
          $event_photo_location = base_path('public/uploads/events/'.$event_photo_name);
          Image::make($upload_event_photo)->resize(500,500)->save($event_photo_location);

          Event::find($create_new_event->id)->update([
            'events_photo'=>$event_photo_name
          ]);
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
         return view('dashboard.edit_events', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //if we have file or not
        if($request->hasFile('events_photo')){
          //is your old photo default photo or not
          if($event->events_photo != 'khalid.jpg'){
            //delete the old photo
            $location = base_path()."/public/uploads/events/".$event->events_photo;
            unlink($location);
          }
          $upload_event_photo = $request->file('events_photo');
          $new_event_photo_name = $event->id.".".$upload_event_photo->extension();
          $event_photo_location = base_path('public/uploads/events/'.$new_event_photo_name);
          Image::make($upload_event_photo)->resize(500,500)->save($event_photo_location);
          $event->events_photo = $new_event_photo_name;
        }
        $event->events_title = $request->events_title;
        $event->events_details = $request->events_details;

        $event->save();

        return redirect('event/show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
      $event->delete();
      return back();
    }
}
