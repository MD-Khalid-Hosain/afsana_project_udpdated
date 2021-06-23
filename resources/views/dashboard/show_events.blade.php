@extends('layouts.dashboard')

@section('content')

    <div class="row">
      <div class="col-md-12">
        <div class="card pd-10 pd-sm-20">
          <h6 class="card-body-title">Events List</h6>


          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">SL No.</th>
                  <th class="wd-15p">ID</th>
                  <th class="wd-20p">Event Title</th>
                  <th class="wd-15p">Details</th>

                  <th class="wd-10p">Photo</th>
                  <th class="wd-25p">Action</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($event_lists as $event_list)
                <tr>
                  <td>{{ $loop->index + 1 }}</td>
                  <td>{{$event_list->id}}</td>
                  <td>{{$event_list->events_title}}</td>
                  <td>{{$event_list->events_details}}</td>


                  <td>
                      <img width="50" src="{{ asset('uploads/events') }}/{{ $event_list->events_photo }}" alt="{{ $event_list->event_photo }}">
                    </td>
                  <td >
                    <div class="btn-group" role="group" aria-label="Basic example">
                      <a type="button" href="{{ route('events.edit', $event_list->id) }}" class="btn btn-info  text-white" title="edit" ><i class="fa fa-pencil"></i></a>
                      <form action="{{ URL::route('events.destroy', $event_list->id) }}" method="POST">
                          <input type="hidden" name="_method" value="DELETE">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <button class="btn btn-danger text-white"><i class="fa fa-trash"></i></button>
                      </form>
                      {{-- <a type="button" class="btn btn-danger text-white" title="delete" ><i class="fa fa-trash"></i></a> --}}

                      <a type="button" href="{{ url('http://127.0.0.1:8000/') }}"class="btn btn-success text-white" title="view" ><i class="fa fa-eye"></i></a>
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
