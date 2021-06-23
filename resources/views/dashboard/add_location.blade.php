@extends('layouts.dashboard')


@section('content')

    <div class="row">
        <div class="col-md-6">
          <div class="card pd-10 pd-sm-20">
            <h6 class="card-body-title">Event location list</h6>


            <div class="table-wrapper">
              <table id="datatable1" class="table display responsive nowrap">
                <thead>
                  <tr>
                    <th class="wd-15p">SL No.</th>
                    <th class="wd-15p">ID</th>
                    <th class="wd-20p">City</th>
                    <th class="wd-15p">Full Address</th>
                    <th class="wd-10p">Photo</th>
                    <th class="wd-25p">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($location_lists as $location_list)
                  <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{$location_list->id}}</td>
                    <td>{{$location_list->city_name}}</td>
                    <td>{{$location_list->city_address}}</td>

                    <td>
                        <img width="50" src="{{ asset('uploads/locations') }}/{{ $location_list->location_photo }}" alt="{{ $location_list->location_photo }}">
                      </td>
                    <td >
                      <div class="btn-group" role="group" aria-label="Basic example">
                        <a type="button" href="{{ route('locations.edit', $location_list->id) }}" class="btn btn-info  text-white" title="edit" ><i class="fa fa-pencil"></i></a>
                        <form action="{{ URL::route('locations.destroy', $location_list->id) }}" method="POST">
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
        <div class="col-md-6">
          <h6 class="card-body-title">Add Event Location</h6>
          {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}
          <form action="{{ route('locations.store') }}" method="post"enctype="multipart/form-data" >
            @csrf
            <div class="form-group">
              <label for="exampleInputEventTitle">City</label>
              <input type="text" name="city_name" class="form-control" id="exampleInputEventTitle" >
              @error ('city_name')
                <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>

            <div class="form-group">
              <label for="exampleFormControlTextarea1">Full Address</label>
              <textarea class="form-control" name="city_address" id="exampleFormControlTextarea1" rows="3"></textarea>
              @error ('city_address')
                <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
            <div class="form-group">
                <label for="exampleFormControlphoto">Photo</label>
                <input type="file" name="location_photo" class="form-control">
                @error ('location_photo')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div><!-- card -->
    </div>


@endsection
