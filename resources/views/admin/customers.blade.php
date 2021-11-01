@extends('layoutadmin.main')

@section('content') 

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6"> 
          <h1 class="m-0">Customers</h1>
        </div><!-- /.col --> 
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddModal">
              Add New Customer
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
          <h5 class="modal-title" id="exampleModalLabel">Add A New Customer</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form action="/store-customer" method="post">
            @csrf
            <div class="row">
              <div class="form-group col-md-6">
                <label>First Name</label>
                <input type="text" name="first_name" class="form-control" >
              </div>
              <div class="form-group col-md-6">
                <label>Last Name</label>
                <input type="text" name="last_name" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label>Address</label>
              <input type="text" name="address" class="form-control">
            </div>
       
            <div class="row">
              <div class="form-group col-md-4">
                <label for="inputCity">City</label>
                <input type="text" name="city" class="form-control" id="inputCity">
              </div>
              <div class="form-group col-md-4">
                <label for="inputState">State</label>
                <select id="inputState" name="state" class="form-control">
                  <option >Select</option>
                  <option value="AL">Alabama</option>
                  <option value="AK">Alaska</option>
                  <option value="AZ">Arizona</option>
                  <option value="AR">Arkansas</option>
                  <option value="CA">California</option>
                  <option value="CO">Colorado</option>
                  <option value="CT">Connecticut</option>
                  <option value="DE">Delaware</option>
                  <option value="DC">District Of Columbia</option>
                  <option value="FL">Florida</option>
                  <option value="GA">Georgia</option>
                  <option value="HI">Hawaii</option>
                  <option value="ID">Idaho</option>
                  <option value="IL">Illinois</option>
                  <option value="IN">Indiana</option>
                  <option value="IA">Iowa</option>
                  <option value="KS">Kansas</option>
                  <option value="KY">Kentucky</option>
                  <option value="LA">Louisiana</option>
                  <option value="ME">Maine</option>
                  <option value="MD">Maryland</option>
                  <option value="MA">Massachusetts</option>
                  <option value="MI">Michigan</option>
                  <option value="MN">Minnesota</option>
                  <option value="MS">Mississippi</option>
                  <option value="MO">Missouri</option>
                  <option value="MT">Montana</option>
                  <option value="NE">Nebraska</option>
                  <option value="NV">Nevada</option>
                  <option value="NH">New Hampshire</option>
                  <option value="NJ">New Jersey</option>
                  <option value="NM">New Mexico</option>
                  <option value="NY">New York</option>
                  <option value="NC">North Carolina</option>
                  <option value="ND">North Dakota</option>
                  <option value="OH">Ohio</option>
                  <option value="OK">Oklahoma</option>
                  <option value="OR">Oregon</option>
                  <option value="PA">Pennsylvania</option>
                  <option value="RI">Rhode Island</option>
                  <option value="SC">South Carolina</option>
                  <option value="SD">South Dakota</option>
                  <option value="TN">Tennessee</option>
                  <option value="TX">Texas</option>
                  <option value="UT">Utah</option>
                  <option value="VT">Vermont</option>
                  <option value="VA">Virginia</option>
                  <option value="WA">Washington</option>
                  <option value="WV">West Virginia</option>
                  <option value="WI">Wisconsin</option>
                  <option value="WY">Wyoming</option>
                </select>
              </div>
              <div class="form-group col-md-4">
                <label for="inputZip">Zip</label>
                <input type="text" name="zip" class="form-control">
              </div>
            </div>

            <div class="row">
              <div class="form-group col-md-6">
                <label>Email</label>
                <input type="email" name="email" class="form-control">
              </div>
              <div class="form-group col-md-6">
                <label>Mobile</label>
                <input type="text" name="mobile" class="form-control">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-4">
                <label>Create Password</label>
                <input type="password" name="password" class="form-control">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-4">
                <label>Repeat Password</label>
                <input type="password" name="password_conf" class="form-control">
             </div>
            </div>
            
            <div><label>Preferred Communication</label></div> 
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="contact" value="eMail">
              <label class="form-check-label" for="skier">Email</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="contact" value="Text message">
              <label class="form-check-label" for="snowboard">Text Message</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="contact" value="Both">
              <label class="form-check-label" for="both">Both</label>
            </div>
                    
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Register</button>
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
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table">
                
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Childrens</th>
                    <th>eMail</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Mobile</th>
                    <th>Zip</th>
                    <th>Action</th>
                  </tr>
                
                @foreach($users as $user)
                
                <tr>
                  <td>{{ $user->id }}</td>
                  <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                  <td>{{ $user->kid->count() }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->meta['address'] }}</td>
                  <td>{{ $user->meta['city'] }}</td>
                  <td>{{ $user->meta['state'] }}</td>
                  <td>{{ $user->meta['mobile'] }}</td>
                  <td>{{ $user->meta['zip'] }}</td>
                  <td>
                    <a href={{"customershow/".$user['id']}}>  <i class="nav-icon fa fa-eye" ></i> </a>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#EditModal{{ $user->id }}"> <i class="nav-icon fa fa-edit" ></i> </a>
                    <a href={{"customerdelete/".$user['id']}}><i class="nav-icon fa fa-trash" ></i> </a>
                  </td>
                  <!-- EditModal -->
                  <div class="modal fade" id="EditModal{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Update Customer</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                          <form action="{{url('/')}}/update-customer/{{ $user->id }}" method="post">
                            @csrf
                            <div class="row">
                              <div class="form-group col-md-6">
                                <label>First Name</label>
                                <input type="text" name="first_name" class="form-control" value="{{ $user->first_name }}" >
                              </div>
                              <div class="form-group col-md-6">
                                <label>Last Name</label>
                                <input type="text" name="last_name" class="form-control" value="{{ $user->last_name }}">
                              </div>
                            </div>
                            <div class="form-group">
                              <label>Address</label>
                              <input type="text" name="address" class="form-control" value="{{ $user->meta['address'] }}">
                            </div>
                       
                            <div class="row">
                              <div class="form-group col-md-4">
                                <label for="inputCity">City</label>
                                <input type="text" name="city" class="form-control" id="inputCity" value="{{ $user->meta['city'] }}">
                              </div>
                              <div class="form-group col-md-4">
                                <label for="inputState">State</label>
                                <select id="inputState" name="state" class="form-control" >
                                  <option >{{ $user->meta['state'] }}</option>
                                  <option value="AL">Alabama</option>
                                  <option value="AK">Alaska</option>
                                  <option value="AZ">Arizona</option>
                                  <option value="AR">Arkansas</option>
                                  <option value="CA">California</option>
                                  <option value="CO">Colorado</option>
                                  <option value="CT">Connecticut</option>
                                  <option value="DE">Delaware</option>
                                  <option value="DC">District Of Columbia</option>
                                  <option value="FL">Florida</option>
                                  <option value="GA">Georgia</option>
                                  <option value="HI">Hawaii</option>
                                  <option value="ID">Idaho</option>
                                  <option value="IL">Illinois</option>
                                  <option value="IN">Indiana</option>
                                  <option value="IA">Iowa</option>
                                  <option value="KS">Kansas</option>
                                  <option value="KY">Kentucky</option>
                                  <option value="LA">Louisiana</option>
                                  <option value="ME">Maine</option>
                                  <option value="MD">Maryland</option>
                                  <option value="MA">Massachusetts</option>
                                  <option value="MI">Michigan</option>
                                  <option value="MN">Minnesota</option>
                                  <option value="MS">Mississippi</option>
                                  <option value="MO">Missouri</option>
                                  <option value="MT">Montana</option>
                                  <option value="NE">Nebraska</option>
                                  <option value="NV">Nevada</option>
                                  <option value="NH">New Hampshire</option>
                                  <option value="NJ">New Jersey</option>
                                  <option value="NM">New Mexico</option>
                                  <option value="NY">New York</option>
                                  <option value="NC">North Carolina</option>
                                  <option value="ND">North Dakota</option>
                                  <option value="OH">Ohio</option>
                                  <option value="OK">Oklahoma</option>
                                  <option value="OR">Oregon</option>
                                  <option value="PA">Pennsylvania</option>
                                  <option value="RI">Rhode Island</option>
                                  <option value="SC">South Carolina</option>
                                  <option value="SD">South Dakota</option>
                                  <option value="TN">Tennessee</option>
                                  <option value="TX">Texas</option>
                                  <option value="UT">Utah</option>
                                  <option value="VT">Vermont</option>
                                  <option value="VA">Virginia</option>
                                  <option value="WA">Washington</option>
                                  <option value="WV">West Virginia</option>
                                  <option value="WI">Wisconsin</option>
                                  <option value="WY">Wyoming</option>
                                </select>
                              </div>
                              <div class="form-group col-md-4">
                                <label for="inputZip">Zip</label>
                                <input type="text" name="zip" class="form-control" value="{{ $user->meta['zip'] }}">
                              </div>
                            </div>

                            <div class="row">
                              <div class="form-group col-md-6">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" readonly value="{{ $user->email }}">
                              </div>
                              <div class="form-group col-md-6">
                                <label>Mobile</label>
                                <input type="text" name="mobile" class="form-control" value="{{ $user->meta['mobile'] }}">
                              </div>
                            </div>
                            <div class="row">
                              <div class="form-group col-md-4">
                                <label>Create Password</label>
                                <input type="password" name="password" class="form-control">
                              </div>
                            </div>
                            <div class="row">
                              <div class="form-group col-md-4">
                                <label>Repeat Password</label>
                                <input type="password" name="password_conf" class="form-control">
                             </div>
                            </div>
                            
                            <div><label>Preferred Communication</label></div> 
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="contact" value="eMail" {{ $user->meta['contact'] == 'eMail' ? 'checked' : '' }}>
                              <label class="form-check-label" for="skier">Email</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="contact" value="Text message" {{ $user->meta['contact'] == 'Text message' ? 'checked' : '' }}>
                              <label class="form-check-label" for="snowboard">Text Message</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="contact" value="Both" {{ $user->meta['contact'] == 'Both' ? 'checked' : '' }}>
                              <label class="form-check-label" for="both">Both</label>
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

   