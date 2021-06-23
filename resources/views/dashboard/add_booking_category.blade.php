@extends('layouts.dashboard')

@section('content')

    <div class="row">
        <div class="col-md-6">
          <h6 class="card-body-title">Add Booking Category</h6>

          <form action="{{ route('booking_category.store') }}" method="post"enctype="multipart/form-data" >
            @csrf
            <div class="form-group">
              <label for="exampleInputEventTitle">Booking Category Title</label>
              <input type="text" name="booking_category_titel" class="form-control" id="exampleInputEventTitle" >
            </div>
            <div class="form-group">
              <label for="exampleInputcategoryprice">Booking Category Price</label>
              <input type="text" name="booking_category_price" class="form-control" id="exampleInputcategoryprice" >
            </div>
            <div class="form-group">
              <label for="per_person_cost">Per Person Cost</label>
              <input type="text" name="per_person_cost" class="form-control" id="per_person_cost" >
            </div>
            <div class="form-group">
              <label for="exampleInputPeople">People Capacity</label>
              <input type="text" name="people_capacity" class="form-control" id="exampleInputPeople" >
            </div>
            <div class="form-group">
              <label for="exampleInputdecoration">Decoration</label>
              <input type="text" name="decoration" class="form-control" id="exampleInputPeople" >
            </div>
            <div class="form-group">
              <label for="exampleInputcateDrink">Welcome Drink</label>
              <input type="text" name="welcome_drink" class="form-control" id="exampleInputcateDrink" >
            </div>
            <div class="form-group">
              <label for="exampleInputcatecoffee">Coffee</label>
              <input type="text" name="coffee" class="form-control" id="exampleInputcatecoffee" >
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div><!-- card -->

        <div class="col-md-6">
          <div class="card pd-10 pd-lg-10">
            <h6 class="card-body-title">Booking Category List</h6>


            <div class="table-wrapper">
              <table id="datatable1" class="table display responsive nowrap">
                <thead>
                  <tr>

                    <th class="wd-15p">ID</th>
                    <th class="wd-20p">Title</th>
                    <th class="wd-15p">Price</th>
                    <th class="wd-15p">Per Person Cost</th>
                    <th class="wd-10p">People Capacity</th>
                    <th class="wd-25p">Decoration</th>
                    <th class="wd-25p">Welcome Drink</th>
                    <th class="wd-25p">Coffee</th>
                    <th class="wd-15p">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($booking_Categories as $booking_Category)
                  <tr>

                    <td>{{$booking_Category->id}}</td>
                    <td>{{$booking_Category->booking_category_titel}}</td>
                    <td>{{$booking_Category->booking_category_price}}tk</td>
                    <td>{{$booking_Category->per_person_cost}}tk</td>
                    <td>{{$booking_Category->people_capacity}}</td>
                    <td>{{$booking_Category->decoration}}</td>
                    <td>{{$booking_Category->welcome_drink}}</td>
                    <td>{{$booking_Category->coffee}}</td>
                    <td >
                      <div class="btn-group" role="group" aria-label="Basic example">
                        <a type="button" href="{{ route('booking_category.edit', $booking_Category->id) }}" class="btn btn-info  text-white" title="edit" ><i class="fa fa-pencil"></i></a>
                        <form action="{{ URL::route('booking_category.destroy', $booking_Category->id) }}" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button class="btn btn-danger text-white"><i class="fa fa-trash"></i></button>
                        </form>
                        {{-- <a type="button" class="btn btn-danger text-white" title="delete" ><i class="fa fa-trash"></i></a> --}}


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
