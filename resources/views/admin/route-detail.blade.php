@extends('layoutadmin.main')

@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Route's Locations</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Add New Location
              </button>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!--Add Child Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Location</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">

            <form method="post" action="/store-location">
              @csrf
              <input type="hidden" name="route_id" value="{{ $route->id }}">

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
                  
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
    <!-- /.Add Child Modal -->

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
            <div class="card-body table-responsive p-0">
              <table class="table">
                <tr>
                  <th>Name</th>
                  <th>Map Link</th>
                  <th>Departs time</th>
                  <th>Return time</th>
                  <th>Address</th>
                  <th>Max # of Customers</th>
                  <th>Description</th>
                  <th>Action</th>
                </tr>
                @foreach($locations as $location)
                <tr>
                  <td>{{ $location->location_name }}</td>
                  <td>{{ $location->map_link }}</td>
                  <td>{{ $location->departs_time }}</td>
                  <td>{{ $location->return_time }}</td>
                  <td>{{ $location->address }}</td>
                  <td>{{ $location->max_customers }}</td>
                  <td>{{ $location->location_description }}</td>
                  <td>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#EditModal{{ $location->id }}"> <i class="nav-icon fa fa-edit" ></i></a>
                    <a href={{url('/')}}/{{"locationdelete/".$location['id']}}><i class="nav-icon fa fa-trash" ></i></a> 

                  </td>

                  <!-- Edit Child Modal -->
                  <div class="modal fade" id="EditModal{{ $location->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Update Location</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                          <form action="{{url('/')}}/update-location/{{ $location->id }}" method="post">
                            @csrf


                            
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /.Edit Child Modal --> 

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