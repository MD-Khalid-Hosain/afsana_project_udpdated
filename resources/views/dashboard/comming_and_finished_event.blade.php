@extends('layouts.dashboard')

@section('content')
  <div class="row">
    <div class="col-md-12 mb-3">
      <div class="card pd-10 pd-sm-20">
        <h6 class="card-body-title">Up Comming Events Booked List</h6>


        <div class="table-wrapper">
          <table id="order_table" class="table display responsive nowrap">
            <thead>
              <tr>

                <th >SL No.</th>
                <th >ID</th>
                <th >User Name</th>
                <th >Email</th>
                <th >User Number</th>
                <th >Event Name</th>
                <th >Category</th>
                <th >Location</th>
                <th >Booked Date</th>
                <th >Status</th>
                <th >Booking Created</th>
                <th >Action</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($up_comming_events as $up_comming_event)
              <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{$up_comming_event->id}}</td>
                <td>{{$up_comming_event->user_name}}</td>
                <td>{{$up_comming_event->user_email}}</td>
                <td>{{$up_comming_event->user_number}}</td>
                <td>{{$up_comming_event->event_title}}</td>
                <td>{{$up_comming_event->event_category}}</td>
                <td>{{$up_comming_event->event_location}}</td>
                <td>{{$up_comming_event->published_at}}</td>
                <td>

                    @if ( $up_comming_event->published_at >=\Carbon\Carbon::now()->format('Y-m-d'))

                      <h4><span class="badge badge-success">Comming</span></h4>

                    @endif

                </td>
                <td>{{$up_comming_event->created_at->diffForHumans()}}</td>

                <td >
                  <div class="btn-group" role="group" aria-label="Basic example">

                    <form action="{{ URL::route('booking_registration.destroy', $up_comming_event->id) }}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button class="btn btn-danger text-white"><i class="fa fa-trash"></i></button>
                    </form>



                  </div>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="15" class="text-center">No Data Available</td>
              </tr>
            @endforelse
            </tbody>
          </table>

        </div><!-- table-wrapper -->
      </div><!-- card -->

    </div>


    <div class="col-md-12">
      <div class="card pd-10 pd-sm-20">
        <h6 class="card-body-title">Completed Events List</h6>


        <div class="table-wrapper">
          <table  class="table display responsive nowrap">
            <thead>
              <tr>

                <th >SL No.</th>
                <th >ID</th>
                <th >User Name</th>
                <th >Email</th>
                <th >User Number</th>
                <th >Event Name</th>
                <th >Category</th>
                <th >Location</th>
                <th >Event Time</th>
                <th >Booked Date</th>
                <th >Status</th>
                <th >Booking Created</th>
                <th >Action</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($finished_events as $finished_event)
              <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{$finished_event->id}}</td>
                <td>{{$finished_event->user_name}}</td>
                <td>{{$finished_event->user_email}}</td>
                <td>{{$finished_event->user_number}}</td>
                <td>{{$finished_event->event_title}}</td>
                <td>{{$finished_event->event_category}}</td>
                <td>{{$finished_event->event_location}}</td>
                <td>{{$finished_event->event_time}}</td>
                <td>{{$finished_event->published_at}}</td>
                <td>

                    @if ( $finished_event->published_at <\Carbon\Carbon::now()->format('Y-m-d'))
                      <h4><span class="badge badge-danger">Completed</span></h4>
                    @endif

                </td>
                <td>{{$finished_event->created_at->diffForHumans()}}</td>

                <td >
                  <div class="btn-group" role="group" aria-label="Basic example">

                    <form action="{{ URL::route('booking_registration.destroy', $finished_event->id) }}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button class="btn btn-danger text-white"><i class="fa fa-trash"></i></button>
                    </form>



                  </div>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="15" class="text-center">No Data Available</td>
              </tr>
            @endforelse
            </tbody>
          </table>

        </div><!-- table-wrapper -->
      </div><!-- card -->

    </div>
  </div>
@endsection
