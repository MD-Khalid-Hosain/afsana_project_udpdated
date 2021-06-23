@extends('layouts.dashboard')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Your user list</div>

                  <div class="card-body">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>SL. No</th>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Password</th>
                          <th>Created</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($user_lists as $index => $user_list)
                          <tr>
                            <td>{{ $user_lists->firstItem() + $index }}</td>
                            <td>{{ $user_list->id }}</td>
                            <td>{{ $user_list->name }}</td>
                            <td>{{ $user_list->email }}</td>
                            <td>*******</td>
                            <td>{{ $user_list->created_at->format('d/m/y') }}</td>
                          </tr>
                        @endforeach

                      </tbody>
                    </table>
                    {{ $user_lists->links() }}

                  </div>

            </div>
        </div>
    </div>

@endsection
