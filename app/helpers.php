<?php

//last month payment history start
function last_month_payment_history(){
  $last_month_data = App\BookingRegistraion::whereMonth('created_at', '=', Carbon\Carbon::now()->subMonthNoOverflow()->month)->get();
    $total_payment_of_last_month = 0;
  foreach ($last_month_data as $last) {
    $total_payment_of_last_month = $total_payment_of_last_month + ($last->total_cost);
  }
  return $total_payment_of_last_month;
}
//last month payment history end
//last month event count start
function last_month_event_count(){
  $last_month_data = App\BookingRegistraion::whereMonth('created_at', '=', Carbon\Carbon::now()->subMonthNoOverflow()->month)->get();
    $total_event_of_last_month = 0;
  foreach ($last_month_data as $last) {
    $total_event_of_last_month = $total_event_of_last_month + ($last->payment_method);


  }
  return $total_event_of_last_month;
}
//last month event count end

// this month total event start
function this_month_booked_event(){
  $this_month_payment = App\BookingRegistraion::whereMonth('created_at', Carbon\Carbon::now())->get();
  $this_moth_total_event = 0;
  foreach ($this_month_payment as $this_month_event) {
     $this_moth_total_event = $this_moth_total_event + ($this_month_event->payment_method);
  }
  return $this_moth_total_event;
}
// this month total event end


// this month payment start
function this_month_total_payment(){
  $this_month_total_payment = App\BookingRegistraion::whereMonth('created_at', Carbon\Carbon::now())->sum('total_cost');
  return $this_month_total_payment;
}
// this month payment end

// this year total event end
function this_year_booked_event(){
  $this_year_payment = App\BookingRegistraion::whereYear('created_at', Carbon\Carbon::now())->get();
  $this_year_total_event = 0;
  foreach ($this_year_payment as $this_year_event) {
     $this_year_total_event = $this_year_total_event + ($this_year_event->payment_method);
  }
  return $this_year_total_event;
}
// this year total event end



// this year payment start
function this_year_total_payment(){
  $this_year_total_payment = App\BookingRegistraion::whereYear('created_at', Carbon\Carbon::now())->sum('total_cost');
  return $this_year_total_payment;
}
// this year payment end
