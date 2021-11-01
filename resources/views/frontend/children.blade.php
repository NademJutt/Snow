@extends('layoutcustomer.main')

@section('content')

<div class="main-panel">
  <div class="content-wrapper">
    
  <h2>
    Children

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addChild">
        Add New Child 
    </button>
    </h2>

    @if($message = Session::get('success'))
      <div class="alert alert-success">
          <p>{{ $message }}</p>
      </div>
    @endif

    @if($message = Session::get('error'))
      <div class="alert alert-danger">
          <p>{{ $message }}</p>
      </div>
    @endif

    <!-- addChild Modal -->
    <div class="modal fade" id="addChild" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add New Child</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">

            <form method="post" action="/store_child">
              @csrf
              <input type="hidden" name="user_id" value="{{ $customer->id }}">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>First Name</label>
                  <input type="text" name="first_name" class="form-control" required>
                </div>
                <div class="form-group col-md-6">
                  <label>Last Name</label>
                  <input type="text" name="last_name" class="form-control" required>
                </div>
              </div>

              <!-- Skier or Snowboard -->
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="category" value="Skier" required>
                <label class="form-check-label" for="skier">Skier</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="category" value="Snowboard" required>
                <label class="form-check-label" for="snowboard">Snowboard</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="category" value="Both" required>
                <label class="form-check-label" for="both">Both</label>
              </div>

              <div><label>Level of Experience</label></div> 
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="experience" value="First time" required>
                <label class="form-check-label" for="">First Time</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="experience" value="Experienced" required>
                <label class="form-check-label" for="">Have skied and snowboard before</label>
              </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Date of Birth</label>
                  <input type="date" name="dob" class="form-control" required>
                </div>
                <div class="form-group col-md-6">
                  <label>Child Mobile Phone #</label>
                  <input type="text" name="childphone" class="form-control" required>
                </div>
              </div>

              <div><label>Gender</label></div> 
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" value="Male" required>
                <label class="form-check-label" for="genderM">Male</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" value="Female" required>
                <label class="form-check-label" for="genderF">Female</label>
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
    <!-- /.Modal -->

    <br>

    <!-- Main content -->

    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
    
          <div class="table-responsive">

           <table class="table">
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Experience</th>
                <th>Date of Birth</th>
                <th>Phone #</th>
                <th>Gender</th>
                <th>Action</th>
              </tr>
              @foreach($kids as $kid)
              <tr>
                <td>{{ $kid->id }}</td>
                <td>{{ $kid->first_name }} {{ $kid->last_name }}</td>
                <td>{{ $kid->category }}</td>
                <td>{{ $kid->experience }}</td>
                <td>{{ $kid->dob }}</td>
                <td>{{ $kid->childphone }}</td>
                <td>{{ $kid->gender }}</td>
                <td>
                  <a href="#" data-bs-toggle="modal" data-bs-target="#EditModal{{ $kid->id }}"> <i class="fa fa-edit" ></i></a>
                  <a href={{url('/')}}/{{"child_delete/".$kid['id']}}><i class="fa fa-trash" ></i></a>        
                </td>

                <!-- Edit Child Modal -->
                <div class="modal fade" id="EditModal{{ $kid->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Child</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">

                        <form action="{{url('/')}}/update_child/{{ $kid->id }}" method="post">
                          @csrf
                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <label>First Name</label>
                              <input type="text" name="first_name" class="form-control" value="{{ $kid->first_name }}">
                            </div>
                            <div class="form-group col-md-6">
                              <label>Last Name</label>
                              <input type="text" name="last_name" class="form-control" value="{{ $kid->last_name }}">
                            </div>
                          </div>

                          <!-- Skier or Snowboard -->
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="category" value="Skier" {{ $kid->category == 'Skier' ? 'checked' : '' }} >
                            <label class="form-check-label" for="skier">Skier</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="category" value="Snowboard" {{ $kid->category == 'Snowboard' ? 'checked' : '' }} >
                            <label class="form-check-label" for="snowboard">Snowboard</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="category" value="Both" {{ $kid->category == 'Both' ? 'checked' : '' }} >
                            <label class="form-check-label" for="both">Both</label>
                          </div>

                          <div><label>Level of Experience</label></div> 
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="experience" value="First time" {{ $kid->experience == 'First time' ? 'checked' : '' }} >
                            <label class="form-check-label" for="">First Time</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="experience" value="Experienced" {{ $kid->experience == 'Experienced' ? 'checked' : '' }} >
                            <label class="form-check-label" for="">Have skied and snowboard before</label>
                          </div>

                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <label>Date of Birth</label>
                              <input type="date" name="dob" class="form-control" value="{{ $kid->dob }}">
                            </div>
                            <div class="form-group col-md-6">
                              <label>Child Mobile Phone #</label>
                              <input type="text" name="childphone" class="form-control" value="{{ $kid->childphone }}" >
                            </div>
                          </div>

                          <div><label>Gender</label></div> 
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" value="Male" {{ $kid->gender == 'Male' ? 'checked' : '' }} >
                            <label class="form-check-label" for="genderM">Male</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" value="Female" {{ $kid->gender == 'Female' ? 'checked' : '' }} >
                            <label class="form-check-label" for="genderF">Female</label>
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
                <!-- /.Edit Child Modal --> 

              </tr>
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









