@extends('layouts.front_page')

@section('content')
  <section class="page-section image breadcrumbs overlay">
      <div class="container">
          <h1>EVENT Booking Details PAGE</h1>
          <ul class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li><a href="#">Events</a></li>
              <li class="active">Event Registration Page</li>
          </ul>
      </div>
  </section>
  <!-- -->
  <hr class="page-divider transparent half"/>
  <!-- -->
  <div class="container">
      <div class="row">
          <div class="col-md-12">
            @foreach ($booking_details as $booking_detail)

              <table class="table table-borderless">
                  <tr>
                    <th scope="col">Your Name:</th>
                    <td>{{ $booking_detail->user_name }}</td>
                  </tr>
                  <tr>
                    <th scope="col">Email:</th>
                    <td>{{ $booking_detail->user_email }}</td>
                  </tr>
                  <tr>
                    <th scope="col">Phone Number:</th>
                    <td>{{ $booking_detail->user_number }}</td>
                  </tr>
                  <tr>
                    <th scope="col">Event Title:</th>
                    <td>{{ $booking_detail->event_title }}</td>
                  </tr>
                  <tr>
                    <th scope="col">Event Category:</th>
                    <td>{{ $booking_detail->event_category }}</td>
                  </tr>
                  <tr>
                    <th scope="col">Event Date:</th>
                    <td>{{ $booking_detail->published_at }}</td>
                  </tr>
                  <tr>
                    <th scope="col">Event Location:</th>
                    <td>{{ $booking_detail->event_location }}</td>
                  </tr>
                  <tr>
                    <th scope="col">Event Booking Date</th>
                    <td>{{ $booking_detail->created_at->format('Y-m-d') }}</td>
                  </tr>
                  <tr>
                    <th scope="col">Total Cost</th>
                    <td style="font-weight: 900;">{{  $booking_detail->total_cost }}tk</td>
                  </tr>
                  <tr>
                    <th scope="col">Due</th>
                    <td style="font-weight: 900;">{{  ($booking_detail->total_cost)/2 }}tk</td>
                  </tr>
                  <tr>
                    <th scope="col">Payment Status</th>
                    <td >@php if ($booking_detail->payment_status == 2) { echo "<h2>50% Paid</h2>"; }  @endphp </td>
                  </tr>
                  <tr>
                    <th scope="col">Event Cancelation</th>
                    <td > @if ($booking_detail->cancel == 0) <a href="{{ url('event/cancle/'.$booking_detail->id) }}" class="btn btn-success">Cancel</a> @else <h2>Event Canceled</h2> <?php
                      $date1=date_create( $booking_detail->published_at);
                      $date2=date_create($currentDate);
                      $diff=date_diff($date1,$date2);
                      if($diff->format("%a") <= 7){
                        echo "you won't get refund";
                      }else{
                        echo "you will get 50% refund of your payment. Please contact with us";
                      }
                      ?> @endif </td>
                  </tr>
                  <tr>
                    <th scope="col">Invoice</th>
                    <td><a href="{{url('generate-pdf', $booking_detail->id)}}">Download PDF</a></td>
                  </tr>
                  


              </table>
              {{ $booking_details->links() }}
            @endforeach
          </div>
      </div>
  </div>
  <!-- -->
  <hr class="page-divider transparent half"/>
  <!-- -->
@endsection
