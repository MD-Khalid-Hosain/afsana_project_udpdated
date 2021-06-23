@extends('layouts.dashboard')

@section('content')
  <div class="container">
    <div class="row">
        <div class="col-md-12">
          <h6 class="card-body-title">Edit Booking Category</h6>

          <form action="{{ route('booking_category.update', $booking_category->id) }}" method="post"enctype="multipart/form-data" >
            @method('PUT')
            @csrf
            <div class="form-group">
              <label for="exampleInputEventTitle">Booking Category Title</label>
              <input type="text" name="booking_category_titel" class="form-control" id="exampleInputEventTitle" value="{{ $booking_category->booking_category_titel }}" >
            </div>
            <div class="form-group">
              <label for="exampleInputcategoryprice">Booking Category Price</label>
              <input type="text" name="booking_category_price" class="form-control" id="exampleInputcategoryprice" value="{{ $booking_category->booking_category_price }}" >
            </div>
            <div class="form-group">
              <label for="per_person_cost">Per Person Cost</label>
              <input type="text" name="per_person_cost" class="form-control" id="per_person_cost" value="{{ $booking_category->per_person_cost }}" >
            </div>
            <div class="form-group">
              <label for="exampleInputPeople">People Capacity</label>
              <input type="text" name="people_capacity" class="form-control" id="exampleInputPeople" value="{{ $booking_category->people_capacity }}" >
            </div>
            <div class="form-group">
              <label for="exampleInputdecoration">Decoration</label>
              <input type="text" name="decoration" class="form-control" id="exampleInputPeople" value="{{ $booking_category->decoration }}" >
            </div>
            <div class="form-group">
              <label for="exampleInputcateDrink">Welcome Drink</label>
              <input type="text" name="welcome_drink" class="form-control" id="exampleInputcateDrink"  value="{{ $booking_category->welcome_drink }}">
            </div>
            <div class="form-group">
              <label for="exampleInputcatecoffee">Coffee</label>
              <input type="text" name="coffee" class="form-control" id="exampleInputcatecoffee" value="{{ $booking_category->coffee }}" >
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
          </form>
        </div><!-- card -->
      </div><!-- card -->
    </div><!-- card -->
@endsection
