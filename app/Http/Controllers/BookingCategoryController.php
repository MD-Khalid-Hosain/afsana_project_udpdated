<?php

namespace App\Http\Controllers;

use App\Booking_Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BookingCategoryController extends Controller
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
	 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $booking_Categories = Booking_Category::all();
        return view('dashboard.add_booking_category', compact('booking_Categories'));
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
        Booking_Category::create([
          'booking_category_titel' =>$request->booking_category_titel,
          'booking_category_price' =>$request->booking_category_price,
          'per_person_cost' =>$request->per_person_cost,
          'people_capacity'        =>$request->people_capacity,
          'decoration' =>$request->decoration,
          'welcome_drink' =>$request->welcome_drink,
          'coffee' =>$request->coffee,
          'created_at' =>Carbon::now()
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Booking_Category  $booking_Category
     * @return \Illuminate\Http\Response
     */
    public function show(Booking_Category $booking_Category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Booking_Category  $booking_Category
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking_Category $booking_category)
    {
        return view('dashboard.edit_booking_category', compact('booking_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Booking_Category  $booking_Category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking_Category $booking_category)
    {
        $booking_category->booking_category_titel  = $request->booking_category_titel;
        $booking_category->booking_category_price  = $request->booking_category_price;
        $booking_category->people_capacity  = $request->people_capacity;
        $booking_category->per_person_cost  = $request->per_person_cost;
        $booking_category->decoration  = $request->decoration;
        $booking_category->welcome_drink  = $request->welcome_drink;
        $booking_category->coffee  = $request->coffee;
        $booking_category->save();

        return redirect(route('booking_category.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Booking_Category  $booking_Category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking_Category $booking_category)
    {
      $booking_category->delete();
      return back();
    }
}
