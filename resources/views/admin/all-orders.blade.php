@extends('layoutadmin.main')

@section('content')  

<style type="text/css">

.col-md-5 .form-group{
  display: flex;
}

.col-md-5 .form-group label{
  width: 147px;
  padding-top: 5px;
}



</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-md-1"> 
          <h1 class="m-0">Orders</h1>
        </div>
        <div class="col-md-7" style="padding-left:100px; "> 
          <form action="" >
           <div class="row">
            <div class="col-md-5">
              <div class="form-group">
                <label>Form Date</label>
                <input type="text" name="from-date" class=" form-control date" autocomplete="off">
              </div>
            </div>
            <div class="col-md-5">
              <div class="form-group">
                <label>To Date</label>
                <input type="text" name="to-date" class="form-control date" autocomplete="off">
              </div>
            </div>
            <div class="col-md-2">
              <button class="btn btn-success" style="margin-right:100px;">Find</button>
            </div>
           </div>
          </form>          
        </div>
        
        <div class="col-sm-4"> 
          <form action="">
              <div class="form-group" style="display:flex;">
                <input type="text" name="query" class="form-control" placeholder="Search" required style="width:200px; margin-left:70px;">
              <button type="submit" class="btn btn-primary">Search</button> 
              </div>
          </form>     
        </div>

      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- AddModal -->
  <div class="modal fade" id="AddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">#</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form action="/store-customer" method="post">
          </form>

        </div>
      </div>
    </div>
  </div>
  <!-- /.AddModal -->

      @if($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
      @endif


  <!-- Main content -->

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table">
                
                  <tr>
                    <th>ID</th>
                    <th>Customer Name</th>
                    <th>Trip Name</th>
                    <th>Trip Price</th>
                    <th>Kids</th>
                    <th>Total Amount</th>
                    <th>Booking Date</th>
                    <th>Action</th>
                  </tr>
                
                @foreach($orders as $order)
                
                <tr>
                  <td>{{ $order->id }}</td>
                  <td>{{ $order->user['first_name'] }}</td>
                  <td>{{ $order->trip->trip_name }}</td>
                  <td>$ {!! number_format((float)($order->trip_price), 2) !!}</td>
                  <td>{{ $order->childrens->count() }}</td>
                  <td>$ {!! number_format((float)($order->total_amount), 2) !!}</td>
                  <td>{{ $order->created_at->format('m/d/y i:h') }}</td>
                  <td>
                    <a href={{"/order_detail/".$order['id']}}>  <i class="nav-icon fa fa-eye" ></i> </a>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#EditModal{{ $order->id }}"> <i class="nav-icon fa fa-edit" ></i> </a>
                    <a href={{"#".$order['id']}}><i class="nav-icon fa fa-trash" ></i> </a>
                  </td>
                  <!-- EditModal -->
                  <div class="modal fade" id="EditModal{{ $order->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">#</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                          <form action="{{url('/')}}/#/{{ $order->id }}" method="post">
                          </form>

                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /.EditModal -->
                  </tr>
                
                @endforeach
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- /.content -->
</div>
  <!-- /.content-wrapper -->




@endsection

   