<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  </head>

  <style type="text/css">
  body{
    padding-top: 20px; 
    font-family: serif;
  }

  </style>

  <body>

    <div class="abc">
        <img src="{{ asset('img/snow.jpg')}}">
    </div>

    <div class="container">
      <div class="col-md-8 offset-2">

            <h3 class="panel-title"> Enter Your Information </h3>

            @if($errors->any())
            <div class="alert alert-danger">
              <strong>Whoops!</strong> There were some problem with your input.<br><br>
              <ul>
                @foreach($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif

            <form action="/store_customer" method="post">
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
                  <input type="password" name="password_confirmation" class="form-control">
               </div>
              </div>
              
              <div><label>Preferred Communication</label></div> 
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="contact" value="eMail">
                <label class="form-check-label" for="skier">Email</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="contact" value="Text Message">
                <label class="form-check-label" for="snowboard">Text Message</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="contact" value="Both">
                <label class="form-check-label" for="both">Both</label>
              </div>
              <div>
                <button type="submit" class="btn btn-primary">Register</button>
              </div>
              
            </form>

      </div>
    </div>
  </body>
</html>









