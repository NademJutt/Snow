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
  .table{
    width:1600px;
    max-width:2000px;
    overflow-x:scroll;
}
.container{
  background: gray;
  margin: 10px;
}
  </style>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6"> 
          <h1 class="m-0">Result for Trips</h1>
        </div><!-- /.col --> 
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

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
                  <td>{{ $trip->price }}</td>
                  <td>{{ $trip->late_booking_date }}</td>
                  <td>{{ $trip->late_price }}</td>
                  <td>{{ $trip->close_trip_booking }}</td>
                  <td>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#EditModal{{ $trip->id }}"> <i class="nav-icon fa fa-edit" ></i> </a>
                    <a href={{"delete_trip/".$trip['id']}}><i class="nav-icon fa fa-trash" ></i> </a>
                  </td>
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
                                <input type="date" name="departure_date" class="form-control" value="{{ $trip->departure_date }}">
                              </div>
                            <div class="form-group col-md-6">
                              <label>Return Date</label>
                              <input type="date" name="return_date" class="form-control" value="{{ $trip->return_date }}">
                              </div>
                          </div>

                          <div class="row">
                              <div class="form-group col-md-6">
                                <label>Booking Close</label>
                                <input type="text" name="booking_close" class="form-control" value="{{ $trip->booking_close }}">
                              </div>
                            <div class="form-group col-md-6">
                              <label>Price $</label>
                              <input type="text" name="price" class="form-control" value="{{ $trip->price }}">
                              </div>
                          </div>

                          <div class="row">
                              <div class="form-group col-md-6">
                                <label>Late Booking Date</label>
                                <input type="date" name="late_booking_date" class="form-control" value="{{ $trip->late_booking_date }}">
                              </div>
                            <div class="form-group col-md-6">
                              <label>Late Price $</label>
                              <input type="text" name="late_price" class="form-control" value="{{ $trip->late_price }}">
                              </div>
                          </div>

                          <div class="row">
                            <div class="form-group col-md-6">
                                <label>Close Trip Booking</label>
                                <input type="text" name="close_trip_booking" class="form-control" value="{{ $trip->close_trip_booking }}">
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

   










