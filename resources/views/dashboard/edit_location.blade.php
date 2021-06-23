@extends('layouts.dashboard')


@section('content')
  <div class="container">
    <div class="row">
        <div class="col-md-12">
          <h6 class="card-body-title">Edit Event Location</h6>

          <form action="{{ route('locations.update', $location->id) }}" method="post"enctype="multipart/form-data" >
            @method('PUT')
            @csrf
            <div class="form-group">
              <label for="exampleInputEventTitle">City</label>
              <input type="text" name="city_name" class="form-control" id="exampleInputEventTitle" value="{{ $location->city_name }}" >
            </div>

            <div class="form-group">
              <label for="exampleFormControlTextarea1">Full Address</label>
              <textarea class="form-control" name="city_address" id="exampleFormControlTextarea1" rows="3">{{ $location->city_address }}
              </textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlphoto">Present Photo</label><br>
                <img src="{{ asset('uploads/locations') }}/{{ $location->location_photo }}" alt="" width="500">
            </div>
            <div class="form-group">
                <label for="exampleFormControlphoto">Photo</label>
                <input type="file" name="location_photo" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div><!-- card -->



    </div>
  </div>

@endsection
