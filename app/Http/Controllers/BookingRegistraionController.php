<?php

namespace App\Http\Controllers;

use App\User;
use App\Event;
use App\Location;
use Carbon\Carbon;
use App\Booking_Category;
use App\BookingRegistraion;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BookingRegistraionController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('verified');

  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }
    public function booking_details()
    {
      $loged_in_id =Auth::user()->email;
        $currentDate = Carbon::now()->format('Y-m-d');
        $event_lists =Event::all();
        $booking_details =BookingRegistraion::where('user_email', '=', $loged_in_id)->orderBy('id', 'desc')->paginate(1);
        return view('front_page.booking_details', compact('event_lists','booking_details','currentDate'));

    }

    public function with_category_id($booking_category_id)
    {

      $event_lists =Event::all();
      $event_locations = Location::all();
      $booking_category_title = Booking_Category::find($booking_category_id);
        return view('front_page.booking_registration', compact('booking_category_title', 'event_locations','event_lists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {
      $request->validate([
      'published_at'=> 'required|after:15 day',
      'user_name'=> 'required',
      'user_email'=> 'required',
      'event_title'=> 'required',
      'event_category'=> 'required',
      'event_location'=> 'required',
      'event_time'=> 'required',
      'user_number'=> 'required|numeric|min:11',
      'people'=> 'required|numeric|max:500'

      ]);
      // if ($request->payment_method == 1) {
      //
      // }
      if(BookingRegistraion::where('published_at', Carbon::parse($request->published_at))->where('event_location', $request->event_location)->where('event_time', $request->event_time)->exists()){
        return back()->with('status', 'Your submited date, time and location is already booked!!');
      }
      else{
        if ($request->payment_method == 1) {
            return view('front_page.exampleHosted',[
              'event_lists' => Event::all(),
              'user_name' =>$request->user_name,
              'user_email' =>$request->user_email,
              'event_title' =>$request->event_title,
              'event_category' =>$request->event_category,
              'published_at' =>$request->published_at,
              'event_location' =>$request->event_location,
              'event_time' =>$request->event_time,
              'user_number' =>$request->user_number,
              'event_cost' =>$request->event_cost,
              'people' =>$request->people,
              'per_person_cost' =>$request->per_person_cost
            ]);
        }
        // BookingRegistraion::create([
        //   'user_name' =>$request->user_name,
        //   'user_email' =>$request->user_email,
        //   'event_title' =>$request->event_title,
        //   'event_category' =>$request->event_category,
        //   'published_at' =>Carbon::parse($request->published_at)->format('d/m/Y'),
        //   'eve4242nt_location' =>$request->event_location,
        //   'user_number' =>$request->user_number,
        //   'event_cost' =>$request->event_cost,
        //   'created_at' =>Carbon::now()
        // ]);
          // return redirect(route('booking_details'))->with('successstatus', 'Your booking successfully submited!!');

      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BookingRegistraion  $bookingRegistraion
     * @return \Illuminate\Http\Response
     */
    public function show(BookingRegistraion $bookingRegistraion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BookingRegistraion  $bookingRegistraion
     * @return \Illuminate\Http\Response
     */
    public function edit(BookingRegistraion $bookingRegistraion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BookingRegistraion  $bookingRegistraion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BookingRegistraion $bookingRegistraion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BookingRegistraion  $bookingRegistraion
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookingRegistraion $booking_registration)
    {
        $booking_registration->delete();
        return back();
    }

    public function eventCancle($id){
      BookingRegistraion::where('id',$id)->update([
        'cancel'=>1
      ]);

      return back();
      
    }
    public function downloadPDF($id) {
      $show = BookingRegistraion::find($id);
      $pdf = PDF::loadView('front_page.invoice', compact('show'))->setPaper('a4', 'landscape');
      
      return $pdf->download('disney.pdf');
}
}
