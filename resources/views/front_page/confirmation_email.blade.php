<h1>Event Management System</h1>
<h2>Cogratulations {{ $user_name }}</h2>
<h4>Your Booking Successfully Done</h4>

<h5>Your Booking Details:</h5>

<li>Your Event Name is : {{ $event_title }}</li>
<li>Category: {{ $event_category }}</li>
<li>Location: {{ $event_location }}</li>
<li>Event Date: {{ $published_at }}</li>
<li>Event Time: {{ $event_time }}</li>
<li>Your Contact Number: {{ $user_number }}</li>
<li>Event Cost: {{ $event_cost }}$</li>
<li>Per Person Cost: {{ $per_person_cost }}$</li>
<li>People: {{ $people }}</li>
<li>Total Cost: {{ $total_cost }}$</li>
<li>Due: {{ $total_cost/2 }}$</li>


<h2>Thank You</h2>
