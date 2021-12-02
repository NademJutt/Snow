@extends('layoutadmin.main')

@section('content')   

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-1"> 
          <h1 class="m-0">Orders</h1>
        </div>
        
        <div class="col-sm-7"> 
          <form action="/search_by_date" method="post">
            @csrf
            <br>
            <div class="container">
              <div class="row">
                <div class="container-fluid">
                  <div class="form-group row">
                    <label for="date" class="col-form-label col-sm-2">From Date</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control input-sm date" name="from_date" required>
                    </div>
                    <label for="date" class="col-form-label col-sm-2">To Date</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control input-sm date" name="to_date" required>
                    </div>
                    <div class="col-sm-2">
                      <button type="submit" class="btn btn-success" name="search">find</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>          
        </div>
        
        <div class="col-sm-4"> 
            <form action="/search_order" class="form-inline">
              <div class="form-group">
                <input type="text" name="query" class="form-control" placeholder="Search">
              </div>
              <button type="submit" class="btn btn-default">Search</button>
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
                    <th>Customer ID</th>
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
                  <td>{{ $order->trip_price }}</td>
                  <td>{{ $order->childrens->count() }}</td>
                  <td>{{ $order->total_amount }}</td>
                  <td>{{ $order->created_at->format('m-d-y i:h') }}</td>
                  <td>
                    <a href={{"#".$order['id']}}>  <i class="nav-icon fa fa-eye" ></i> </a>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#EditModal{{ $order->id }}"> <i class="nav-icon fa fa-edit" ></i> </a>
                    <a href={{"#".$order['id']}}><i class="nav-icon fa fa-trash" ></i> </a>
                  </td>
                  <!-- EditModal -->
                  <div class="modal fade" id="EditModal{{ $order->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Update Customer</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                          <form action="{{url('/')}}/update-customer/{{ $order->id }}" method="post">
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

   