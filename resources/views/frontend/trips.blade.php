@extends('layoutcustomer.main')

@section('content')

<div class="main-panel">
  <div class="content-wrapper">
   
    @include('errors')

    <br>

    <!-- Main content -->

    <div class="table-responsive">
       <table class="table">
       
            <thead>
              <tr>
                <th>Name</th>
                <th>Departure</th>
                <th>Return</th>
                <th>Action</th>
              </tr>
            </thead>

          @foreach($trips as $trip)
             <tr>
                <td>{{ $trip->trip_name }}</td>
                <td>{{ $trip->departure_date }}</td>
                <td>{{ $trip->return_date }}</td>
                <td style="border: none">
                   <a  href={{"trip_detail/".$trip['id']}} class="btn btn-primary " style="padding: 5px 10px 3px 10px;">Buy</a>
                </td>
             </tr>
             
          
          @endforeach
       </table>
    </div>

    
    <!-- /.content -->  

  </div>
</div>
 

@endsection









