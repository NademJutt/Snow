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
             
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Trip Price</th>
                      <th>Total Amount</th>
                      <th>Trip</th>
                      <th>Kids</th>
                      <th>Action</th>
                    </tr>
                  </thead>

                @foreach($orders as $order)
                   <tr>
                      <td>{{ $order->id }}</td>
                      <td>{{ $order->trip_price }}</td>
                      <td>{{ $order->total_amount }}</td>
                      <td>{{ $order->trip->trip_name }}</td>
                      <td>{{ $order->childrens->count() }}</td>
                      <td style="border: none">
                         <a  href={{"order_delete/".$order['id']}}><i class="fa fa-trash" ></i></a>
                      </td>
                   </tr> 

                   <ul> 
                    @foreach($order->childrens as $children)

                    <tr>
                      <td>{{$children->first_name}}</td>
                    </tr>

                    @endforeach
                   </ul>
                   
                
                @endforeach

                <br>
             </table>
          </div>  
          


        </div>
      </div>
    </div>

    

    
    <!-- /.content -->  

  </div>
</div>
 

@endsection









