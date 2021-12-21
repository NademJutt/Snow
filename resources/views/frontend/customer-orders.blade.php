@extends('layoutcustomer.main')

@section('content')

<div class="main-panel">
  <div class="content-wrapper">
   
    @include('errors')

    <br>

    <!-- Main content -->

    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">

          <div class="table-responsive">
             <table class="table">
             
                  <thead style="background:#E7EAED;">
                    <tr>
                      <th>ID</th>
                      <th>Trip Price</th>
                      <th>Total Amount</th>
                      <th>Trip</th>
                      <th>Kids</th>
                    </tr>
                  </thead>

                @foreach($orders as $order)
                   <tr style="background:black; color:#fff;">
                      <td>{{ $order->id }}</td>
                      <td>$ {!! number_format((float)($order->trip_price), 2) !!}</td>
                      <td>$ {!! number_format((float)($order->total_amount), 2) !!}</td>
                      <td>{{ $order->trip->trip_name }}</td>
                      <td>{{ $order->childrens->count() }}</td>
                   </tr> 

                    <ul>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Category</th>
                      <th>Experience</th>
                      <th>Date of Birth</th>
                      <th>Phone #</th>
                      <th>Gender</th>
                    </tr>
                    @foreach($order->childrens as $children)
                    <tr>
                      <td>{{ $children->id }}</td>
                      <td>{{ $children->first_name }} {{ $children->last_name }}</td>
                      <td>{{ $children->category }}</td>
                      <td>{{ $children->experience }}</td>
                      <td>{{ $children->dob->format('m/d/y') }}</td>
                      <td>{{ $children->childphone }}</td>
                      <td>{{ $children->gender }}</td>
                    </tr>
                    @endforeach

                   </ul>
                   
                
                @endforeach

             </table>
          </div>  
          


        </div>
      </div>
    </div>

    

    
    <!-- /.content -->  

  </div>
</div>
 

@endsection









