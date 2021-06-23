<?php

namespace App\Http\Controllers;

use App\Location;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Image;

class LocationController extends Controller
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
        $location_lists =  Location::all();
      return view('dashboard.add_location', compact('location_lists'));
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
      'city_name'=> 'required',
      'city_address'=> 'required',
      'location_photo'=> 'required'

      ]);

      $create_new_location = Location::create([
        'city_name'   =>$request->city_name,
        'city_address' =>$request->city_address,
        'location_photo' =>'location.jpg',
        'created_at'     =>Carbon::now()
      ]);

      //upload photo

      if($request->hasFile('location_photo')){
        $upload_location_photo = $request->file('location_photo');
        $location_photo_name = $create_new_location->id.".".$upload_location_photo->extension();
        $location_photo_location = base_path('public/uploads/locations/'.$location_photo_name);
        Image::make($upload_location_photo)->resize(500,500)->save($location_photo_location);

        Location::find($create_new_location->id)->update([
          'location_photo'=>$location_photo_name
        ]);
      }
      return back()->with('locaiton_error', 'your event location is added successfully !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location)
    {
         return view('dashboard.edit_location', compact('location'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Location $location)
    {
      //if we have file or not
      if($request->hasFile('location_photo')){
        //is your old photo default photo or not
        if($location->location_photo != 'location.jpg'){
          //delete the old photo
          $location_path = base_path()."/public/uploads/locations/".$location->location_photo;
          unlink($location_path);
        }
        $upload_location_photo = $request->file('location_photo');
        $new_location_photo_name = $location->id.".".$upload_location_photo->extension();
        $locations_photo_location = base_path('public/uploads/locations/'.$new_location_photo_name);
        Image::make($upload_location_photo)->resize(500,500)->save($locations_photo_location);
        $location->location_photo = $new_location_photo_name;
      }
      $location->city_name = $request->city_name;
      $location->city_address = $request->city_address;
      $location->save();

      return redirect(route('locations.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
      $location->delete();
      return back();
    }
}
