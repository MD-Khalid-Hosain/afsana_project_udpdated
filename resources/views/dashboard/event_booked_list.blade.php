@extends('layouts.dashboard')


@section('content')


          <div class="col-md-12">
              <div class="card pd-10 pd-sm-20">
                <h6 class="card-body-title">Completed Events List</h6>
                <div class="row input-daterange">
               <div class="col-md-4">
                   <input type="date" name="from_date" id="from_date" class="form-control " placeholder="From Date" readonly />
               </div>
               <div class="col-md-4">
                   <input type="date" name="to_date" id="to_date" class="form-control" placeholder="To Date" readonly />
               </div>
               <div class="col-md-4">
                   <a  id="generate" class="btn btn-primary">Filter</a>
                   <button type="button" name="refresh" id="refresh" class="btn btn-default">Refresh</button>
               </div>
           </div>
           {!! $dataTable->table() !!}



              </div><!-- card -->

            </div>

  @endsection

  @section('footer_script')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
<script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
  @endsection
@push('script')
  {!! $dataTable->scripts() !!}

<script>
$(document).ready(function(){
 $('.input-daterange').datepicker({
  todayBtn:'linked',
  format:'yyyy-mm-dd',
  autoclose:true
 });
});
  const table = $('#bookingregistraion-table');



  table.on('preXhr.dt',function(e,settings,data){
    data.from_date = $('#from_date').val();
    data.to_date = $('#to_date').val();

    console.log(  data.from_date,data.to_date)
  });

  $('#generate').on('click',function(){
    console.log('hello');
    table.DataTable().ajax.reload();
    return false;
  })
</script>








  {{-- <script>
  $(document).ready(function(){
   $('.input-daterange').datepicker({
    todayBtn:'linked',
    format:'yyyy-mm-dd',
    autoclose:true
   });

   load_data();

   function load_data(from_date = '', to_date = '')
   {
    $('#order_table').DataTable({
     processing: true,
     serverSide: true,
     ajax: {
      url:'{{ route("event_search") }}',
      data:{from_date:from_date, to_date:to_date}
     },
     columns: [
       {
      data:'user_id',
      name:'user_id'
     },
     {
      data:'user_name',
      name:'user_name'
     },
     {
      data:'user_email',
      name:'user_email'
     },
     {
      data:'event_title',
      name:'event_title'
     },
     {
      data:'event_category',
      name:'event_category'
    },
     {
      data:'published_at',
      name:'published_at'
    },
     {
      data:'event_location',
      name:'event_location'
    },
     {
      data:'event_time',
      name:'event_time'
    },
     {
      data:'event_cost',
      name:'event_cost'
     },
     {
      data:'per_person_cost',
      name:'per_person_cost'
     },
     {
      data:'total_cost',
      name:'total_cost'
     },
     {
      data:'people',
      name:'people'
     },
     {
      data:'payment_method',
      name:'payment_method'
     },
     {
      data:'payment_status',
      name:'payment_status'
     },
     {
      data:'user_number',
      name:'user_number'
     },
     {
      data:'created_at',
      name:'created_at'
     },
     {
      data:'updated_at',
      name:'updated_at'
     },
     {
      data:'deleted_at',
      name:'deleted_at'
    }
  ],

    });


   $('#filter').click(function(){
    var from_date = $('#from_date').val();
    var to_date = $('#to_date').val();
    if(from_date != '' &&  to_date != '')
    {
     $('#order_table').DataTable().destroy();
     load_data(from_date, to_date);
    }
    else
    {
     alert('Both Date is required');
    }
   });

   $('#refresh').click(function(){
    $('#from_date').val('');
    $('#to_date').val('');
    $('#order_table').DataTable().destroy();
    load_data();
   });

  });
  </script> --}}

@endpush
