@extends('layouts.dashboard')


@section('content')
  <div class="container">
    <div class="row">
        <div class="col-md-12">
          <h6 class="card-body-title">Add Events</h6>

          <form action="{{ route('events.update', $event->id) }}" method="post"enctype="multipart/form-data" >
            @method('PUT')
            @csrf
            <div class="form-group">
              <label for="exampleInputEventTitle">Events Title</label>
              <input type="text" name="events_title" class="form-control" id="exampleInputEventTitle" value="{{ $event->events_title }}">
            </div>

            <div class="form-group">
              <label for="exampleFormControlTextarea1">Event Details</label>
              <textarea class="form-control" name="events_details" id="exampleFormControlTextarea1" rows="3" >
                {{ $event->events_details }}
              </textarea>
            </div>

            <div class="form-group">
                <label for="exampleFormControlphoto">Present Photo</label><br>
                <img src="{{ asset('uploads/events') }}/{{ $event->events_photo }}" alt="" width="100">
            </div>
            <div class="form-group">
                <label for="exampleFormControlphoto">Photo</label>
                <input type="file" name="events_photo" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
@endsection
