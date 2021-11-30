@extends('layoutadmin.main')

@section('content') 

<style type="text/css">
  .form-control{ 
    height: 30px;
    margin-top: -8px;
  }
  label:not(.form-check-label):not(.custom-file-label) {
    font-weight: 600;
  }
  .container{
    background: gray; 
  }
  .modal-dialog {
    max-width: 900px;
    margin: 1.75rem auto;
}
.add{
  background: green;
  margin-bottom: 10px;
  border: green;
}
.modal-dialog {
    max-width: 900px;
    margin: 1.75rem auto;
  }

  </style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6"> 
          <h1 class="m-0">Routes</h1>
        </div>
        <div class="col-sm-4"> 

            <form action="/search_route" class="form-inline">
              <div class="form-group">
                <input type="text" name="query" class="form-control" placeholder="Search">
              </div>
              <button type="submit" class="btn btn-default">Search</button>
            </form>
          
        </div>
        <div class="col-sm-2">
          <ol class="breadcrumb float-sm-right">
            <!-- Search -->
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddModal">
              Add New Route
            </button>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- AddModal -->
  <div class="modal fade" id="AddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Route</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form action="/store_route" method="post" autocomplete="off">
            @csrf
            
            <div class="row">
              <div class="form-group col-md-4">
              	<label>Name</label>
                  <input type="text" name="route_name" class="form-control" required>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-8">
                <label>Short Description</label>
                  <input type="text" name="route_description" class="form-control" required>
              </div>
            </div>

            <div class="container">
              <div>
                <h5>Location</h5>
              </div>
              <div class="row">
                <div class="form-group col-md-6">
                	<label>Name</label>
                	<input type="text" name="location_name" class="form-control date" >
                </div>
              	<div class="form-group col-md-6">
  	            	<label>Map Link</label>
  	            	<input type="text" name="map_link" class="form-control date" >
              	</div>
              </div>
              <div class="row">
                <div class="form-group col-md-6">
                  <label>Departs time</label>
                  <input type="time" name="departure_time" class="form-control" >
                </div>
                <div class="form-group col-md-6">
                  <label>Return time</label>
                  <input type="time" name="return_time" class="form-control" >
                </div>
              </div>

              <div class="row">
                <div class="form-group col-md-12">
                	<label>Address</label>
                	<input type="text" name="address" class="form-control" >
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-12">
                  <label>Max # of Customers</label>
                  <input type="text" name="max_customers" class="form-control" >
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-12">
                  <label>Description</label>
                  <textarea type="text" name="location_description" class="form-control" ></textarea>
                </div>
              </div>

              <div>
                <button type="submit" class="btn btn-primary add">Add</button>
              </div>
            </div>
            <!-- End Container -->

            <br>

            <h5>Locations</h5>
              <table class="table">
                  <tr>
                    <th>Name</th>
                    <th>Departs Time</th>
                    <th>Return Time</th>
                    <th>Max # of Customers</th>
                    <th>Action</th>
                  </tr>
                
               <!-- W C  -->
              </table> 
         
                   

            <div class="row">
                <div class="form-group col-md-4">
                  <label>Status</label>
                  <input type="text" name="route_status" class="form-control" >
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-2">
                  <label>Display Order</label>
                  <input type="text" name="display_order" class="form-control">
                </div>
              </div>

              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Add Route</button>
              </div>
            
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
            <!-- card-header -->
            <div class="card-body table-responsive p-0 scroll">
              <table class="table">
                
                  <tr>
                    <th>ID</th>
                    <th>Route Name</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Display Order</th>
                    <th>Action</th>
                  </tr>
                
                @foreach($routes as $route) 
                <tr>
                  <td>{{ $route->id }}</td>
                  <td>{{ $route->route_name }}</td>
                  <td>{{ $route->route_description }}</td>
                  <td>{{ $route->route_status }}</td>
                  <td>{{ $route->display_order }}</td>
                  
                  <td>
                    <a href={{"routeshow/".$route['id']}}> <i class="nav-icon fa fa-eye" ></i> </a>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#EditModal{{ $route->id }}"> <i class="nav-icon fa fa-edit" ></i> </a>
                    <a href={{"delete_route/".$route['id']}}><i class="nav-icon fa fa-trash" ></i> </a>
                  </td>
                  <!-- EditModal -->
                  <div class="modal fade" id="EditModal{{ $route->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Update route</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                          <form action="{{url('/')}}/update_route/{{ $route->id }}" method="post">
                            @csrf

                            <div class="row">
                              <div class="form-group col-md-4">
                                <label>Name</label>
                                  <input type="text" name="route_name" class="form-control" value="{{ $route->route_name }}">
                              </div>
                            </div>
                            <div class="row">
                              <div class="form-group col-md-8">
                                <label>Short Description</label>
                                  <input type="text" name="route_description" class="form-control" value="{{ $route->route_description }}">
                              </div>
                            </div>

                            <div class="container">
                              <div>
                                <h5>Location</h5>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-6">
                                  <label>Name</label>
                                  <input type="text" name="location_name" class="form-control date" >
                                </div>
                                <div class="form-group col-md-6">
                                  <label>Map Link</label>
                                  <input type="text" name="map_link" class="form-control date" >
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-6">
                                  <label>Departs time</label>
                                  <input type="time" name="departure_time" class="form-control" >
                                </div>
                                <div class="form-group col-md-6">
                                  <label>Return time</label>
                                  <input type="time" name="return_time" class="form-control" >
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-12">
                                  <label>Address</label>
                                  <input type="text" name="address" class="form-control" >
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-12">
                                  <label>Max # of Customers</label>
                                  <input type="text" name="max_customers" class="form-control" >
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-12">
                                  <label>Description</label>
                                  <textarea type="text" name="location_description" class="form-control" ></textarea>
                                </div>
                              </div>

                              <div>
                                <button type="submit" class="btn btn-primary add">Add</button>
                              </div>
                            </div>
                            <!-- End Container -->
                         
            
                            <div class="row">
                                <div class="form-group col-md-4">
                                  <label>Status</label>
                                  <input type="text" name="route_status" class="form-control" value="{{ $route->route_status }}" >
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-2">
                                  <label>Display Order</label>
                                  <input type="text" name="display_order" class="form-control" value="{{ $route->display_order }}">
                                </div>
                              </div>

                                    
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                              </div>
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



   










