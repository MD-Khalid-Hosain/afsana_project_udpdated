<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Event;
use App\Location;
Use App\User;
use App\Charts\SevenDaysBookingChart;
use App\BookingRegistraion;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
     public function __construct()
     {
       $this->middleware('auth');
       $this->middleware('verified');

     }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

      if(Auth::user()->role_id==1){

        //chart for 7days start

        for ($i=1; $i <=7; $i++) {
        $date[] = Carbon::now()->subDays(7-$i)->format('Y-m-d');

        $booking[] = BookingRegistraion::whereDate('created_at', Carbon::now()->subDays(7-$i)->format('Y-m-d') )->sum('total_cost');
        }

        $seven_days_booking_chart = new SevenDaysBookingChart;
        $seven_days_booking_chart->labels($date);
        $seven_days_booking_chart->dataset('Last 7 Days Details', 'bar', $booking);
        //chart for 7days end
          return view('home',compact('seven_days_booking_chart'));
      }
      else{
        $event_lists = Event::all();
        $location_lists = Location::all();
          return view('front_page.index', compact('event_lists','location_lists'));

      }
    }
    public function user_list(){
      $loged_in_id = Auth::id();
      return view('dashboard.user_list',[
        'user_lists'=> User::where('id', '!=', $loged_in_id)->where('email_verified_at', '!=', '')->orderBy('id', 'desc')->paginate(2)
      ]);
    }
}
