@extends('layoutadmin.main')

@section('content') 
<style type="text/css">
 
  label:not(.form-check-label):not(.custom-file-label) {
    font-weight: 600;
  } 
  .table{
    width:1600px;
    max-width:2000px;  
    overflow-x:scroll; 
  }
  .container{
    background: gray; 
    margin: 3px;
  }
  h6{
    padding-top: 20px;
  }
 
  .night{margin-top: 40px;}
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
          <h1 class="m-0">Trips</h1>
        </div>

        <div class="col-sm-4"> 
          <form action="/trips">
              <div class="form-group" style="display:flex;">
                <input type="text" name="query" class="form-control" placeholder="Search" value="{{request('query')}}">
              <button type="submit" class="btn btn-primary">Search</button> 
              </div>
          </form>     
        </div>

        <div class="col-sm-2">
          <ol class="breadcrumb float-sm-right">
            <!-- Search -->
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddModal">
              Add New Trip
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
          <h5 class="modal-title" id="exampleModalLabel">Add Trip</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form action="{{route('StoreTrip')}}" method="POST" autocomplete="off">
            @csrf
            
            <div class="row">
              <div class="form-group col-md-8">
              	<label>Trip Name</label>
                  <input type="text" name="trip_name" class="form-control" required>
              </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                	<label>Departure Date</label>
                	<input type="text" name="departure_date" class="form-control date" required>
                </div>
             	<div class="form-group col-md-6">
	            	<label>Return Date</label>
	            	<input type="text" name="return_date" class="form-control date" required>
              	</div>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                	<label>Booking Close</label>
                	<input type="text" name="booking_close" class="form-control date" required>
                </div>
             	<div class="form-group col-md-6">
	            	<label>Price $</label>
	            	<input type="text" name="price" class="form-control" required>
              	</div>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                	<label>Late Booking Date</label>
                	<input type="text" name="late_booking_date" class="form-control date" required>
                </div>
             	<div class="form-group col-md-6">
	            	<label>Late Price $</label>
	            	<input type="text" name="late_price" class="form-control" required>
              	</div>
            </div>

            <div class="row">
              <div class="form-group col-md-6">
  	            	<label>Close Trip Booking</label>
  	            	<input type="text" name="close_trip_booking" class="form-control date" required>
              </div>
            </div>

            <div class="container">
              <div>
                <p><h6>Special Rates</h6></p>
              </div>

              <div class="row">
                <div class="col-md-4">
                  <p><h6>Staff Kids:</h6></p>
                </div>
                <div class="form-group col-md-4">
                  <label>price</label>
                  <input type="text" name="special_StaffKid_price" class="form-control">
                </div>
               <div class="form-group col-md-4">
                  <label>Late Price</label>
                  <input type="text" name="special_StaffKid_latePrice" class="form-control">
               </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <p><h6>Junier Instructor:</h6></p>
                </div>
                <div class="form-group col-md-4">
                  <input type="text" name="special_JuniorInstructor_price" class="form-control">
                </div>
               <div class="form-group col-md-4">
                  <input type="text" name="special_JuniorInstructor_latePrice " class="form-control">
               </div>
              </div> 

            </div>

            <div class="row ">
              <div class="form-group col-md-4">
                <label>Select Route</label>
                <select class="form-control" id="choices-multiple-remove-button" multiple name="route_id[]">
                  <option value="">Select</option>
                  @foreach($routes as $route)
                     <option value="{{ $route->id }}">{{ $route->route_name }}</option>
                  @endforeach
              </select> 

              </div>
              <div class="form-group col-md-4 ab">
                <label>Status</label>
                <input type="text" name="status" class="form-control" required>
              </div>
              <div class="form-group col-md-4 night" >
                <input type="checkbox" name="night" value="1">Night?
              </div>
            </div>
    
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Add</button>
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
                    <th>Trip Name</th>
                    <th>Departure Date</th>
                    <th>Return Date</th>
                    <th>Booking Close</th>
                    <th>Price $</th>
                    <th>Late Booking Date</th>
                    <th>Late Price $</th>
                    <th>Close Trip Booking</th>
                    <th>Action</th>
                  </tr>
                
                @foreach($trips as $trip)
                <tr>
                  <td>{{ $trip->id }}</td>
                  <td>{{ $trip->trip_name }}</td>
                  <td>{{ $trip->departure_date }}</td>
                  <td>{{ $trip->return_date }}</td>
                  <td>{{ $trip->booking_close }}</td>
                  <td>${!! number_format((float)($trip->price), 2) !!}</td>
                  <td>{{ $trip->late_booking_date }}</td>
                  <td>${!! number_format((float)($trip->late_price), 2) !!}</td>
                  <td>{{ $trip->close_trip_booking }}</td>
                  <td>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#ShowModal{{ $trip->id }}"> <i class="nav-icon fa fa-eye" ></i> </a>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#EditModal{{ $trip->id }}"> <i class="nav-icon fa fa-edit" ></i> </a>
                    <a href={{"delete_trip/".$trip['id']}}><i class="nav-icon fa fa-trash" ></i> </a>
                  </td>

                  <!-- ShowModal -->
                  <div class="modal fade" id="ShowModal{{ $trip->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Trip's Routes</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

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
                            
                            @foreach($trip->routes as $route) 
                            <tr>
                              <td>{{ $route->id }}</td>
                              <td>{{ $route->route_name }}</td>
                              <td>{{ $route->route_description }}</td>
                              <td>{{ $route->route_status }}</td>
                              <td>{{ $route->display_order }}</td>
                            </tr>
                            @endforeach
                          </table>
                        </div>

                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /.ShowModal -->



                  <!-- EditModal -->
                  <div class="modal fade" id="EditModal{{ $trip->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Update Trip</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                          <form action="{{url('/')}}/update_trip/{{ $trip->id }}" method="post">
                            @csrf

                          <div class="row">
                            <div class="form-group col-md-8">
                              <label>Trip Name</label>
                                <input type="text" name="trip_name" class="form-control" value="{{ $trip->trip_name }}">
                            </div>
                          </div>

                          <div class="row">
                              <div class="form-group col-md-6">
                                <label>Departure Date</label>
                                <input type="text" name="departure_date" class="form-control date" value="{{ $trip->departure_date }}">
                              </div>
                            <div class="form-group col-md-6">
                              <label>Return Date</label>
                              <input type="text" name="return_date" class="form-control date" value="{{ $trip->return_date }}">
                              </div>
                          </div>

                          <div class="row">
                              <div class="form-group col-md-6">
                                <label>Booking Close</label>
                                <input type="text" name="booking_close" class="form-control date" value="{{ $trip->booking_close }}">
                              </div>
                            <div class="form-group col-md-6">
                              <label>Price $</label>
                              <input type="text" name="price" class="form-control" value="{{ $trip->price }}">
                              </div>
                          </div>

                          <div class="row">
                              <div class="form-group col-md-6">
                                <label>Late Booking Date</label>
                                <input type="text" name="late_booking_date" class="form-control date" value="{{ $trip->late_booking_date }}">
                              </div>
                            <div class="form-group col-md-6">
                              <label>Late Price $</label>
                              <input type="text" name="late_price" class="form-control" value="{{ $trip->late_price }}">
                              </div>
                          </div>

                          <div class="row">
                            <div class="form-group col-md-6">
                                <label>Close Trip Booking</label>
                                <input type="text" name="close_trip_booking" class="form-control date" value="{{ $trip->close_trip_booking }}">
                            </div>
                          </div>

                          <div class="container">
                            <div>
                              <p><h6>Special Rates</h6></p>
                            </div>

                            <div class="row">
                              <div class="col-md-4">
                                <p><h6>Staff Kids:</h6></p>
                              </div>
                              <div class="form-group col-md-4">
                                <label>price</label>
                                <input type="text" name="special_StaffKid_price" class="form-control" value="{{ $trip->special_StaffKid_price }}">
                              </div>
                             <div class="form-group col-md-4">
                                <label>Late Price</label>
                                <input type="text" name="special_StaffKid_latePrice" class="form-control" value="{{ $trip->special_StaffKid_latePrice }}">
                             </div>
                            </div>
                            <div class="row">
                              <div class="col-md-4">
                                <p><h6>Junier Instructor:</h6></p>
                              </div>
                              <div class="form-group col-md-4">
                                <input type="text" name="special_JuniorInstructor_price" class="form-control" value="{{ $trip->special_JuniorInstructor_price }}">
                              </div>
                             <div class="form-group col-md-4">
                                <input type="text" name="special_JuniorInstructor_latePrice " class="form-control" value="{{ $trip->special_JuniorInstructor_latePrice }}">
                             </div>
                            </div>

                          </div>

                          <div class="row">
                            <div class="form-group col-md-4">
                              <label>Select Route</label>
                              <input type="text" name="route" class="form-control" value="{{ $trip->route }}">
                            </div>
                            <div class="form-group col-md-4">
                              <label>Status</label>
                              <input type="text" name="status" class="form-control" value="{{ $trip->status }}">
                            </div>
                            <div class="form-group col-md-4">
                              <input type="checkbox" name="night" value="1" {{ $trip->night == '1' ? 'checked' : '' }}>Night?
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

   










