<!DOCTYPE html>
<html>
<head>
  <style>
#customers {
font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
border-collapse: collapse;
width: 100%;
}

#customers td, #customers th {
border: 1px solid #ddd;
padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
padding-top: 12px;
padding-bottom: 12px;
text-align: left;
background-color: #4CAF50;
color: white;
}
</style>
</head>
<body>

            <table id="customers">
              <thead>

              </thead>
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
                <th >Total Cost</th>
                <th >People</th>
                <th >Booking Created</th>
              </tr>

                <tbody>
                  @forelse ($up_comming_events as $up_comming_event)
                  <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{$up_comming_event->user_id}}</td>
                    <td>{{$up_comming_event->user_name}}</td>
                    <td>{{$up_comming_event->user_email}}</td>
                    <td>{{$up_comming_event->user_number}}</td>
                    <td>{{$up_comming_event->event_title}}</td>
                    <td>{{$up_comming_event->event_category}}</td>
                    <td>{{$up_comming_event->event_location}}</td>
                    <td>{{$up_comming_event->published_at}}</td>
                    <td>{{$up_comming_event->total_cost}}</td>
                    <td>{{$up_comming_event->people}}</td>
                    <td>{{$up_comming_event->created_at}}</td>

                  </tr>
                @empty
                  <tr>
                    <td colspan="15" class="text-center">No Data Available</td>
                  </tr>
                @endforelse
                </tbody>
            </table>

</body>
</html>
