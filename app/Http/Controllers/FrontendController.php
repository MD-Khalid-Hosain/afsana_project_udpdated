<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Location;
use App\Booking_Category;

class FrontendController extends Controller
{
    public function home_page() {
      $event_lists = Event::all();
      $location_lists = Location::all();
        return view('front_page.index', compact('event_lists','location_lists'));
      }

    public function event_details($details_id) {
        $event_lists = Event::all();
        $booking_categories = Booking_Category::all();
        $single_event_details = Event::find($details_id);
        return view('front_page.event_details', compact('single_event_details','booking_categories','event_lists'));

      }

}
