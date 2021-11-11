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

        <h1>Purchase Membership</h1>

        @if(  $number_of_childern )

        <h6>Enter your child's information </h6>

        <form  action="{{route('store_children')}}" method="POST">
          @csrf
          @for($i = 1; $i <= $number_of_childern ; $i++ )
          <p>
          <h5>Child # {{$i}}</h5>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label>First Name</label>
              <input type="text" name="childern[{{$i}}][first_name]" class="form-control" required>
            </div>
            <div class="form-group col-md-6">
              <label>Last Name</label>
              <input type="text" name="childern[{{$i}}][last_name]" class="form-control" required>
            </div>
          </div>

          <!-- Skier or Snowboard -->
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="childern[{{$i}}][category]" value="Skier" required>
            <label class="form-check-label" for="skier">Skier</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="childern[{{$i}}][category]" value="Snowboard" required>
            <label class="form-check-label" for="snowboard">Snowboard</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="childern[{{$i}}][category]" value="Both" required>
            <label class="form-check-label" for="both">Both</label>
          </div>

          <div><label>Level of Experience</label></div> 
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="childern[{{$i}}][experience]" value="First time" required>
            <label class="form-check-label" for="">First Time</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="childern[{{$i}}][experience]" value="Experienced" required>
            <label class="form-check-label" for="">Have skied and snowboard before</label>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Date of Birth</label>
              <input type="date" name="childern[{{$i}}][dob]" class="form-control" required>
            </div>
            <div class="form-group col-md-6">
              <label>Child Mobile Phone #</label>
              <input type="text" name="childern[{{$i}}][childphone]" class="form-control" required>
            </div>
          </div>

          <div><label>Gender</label></div> 
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="childern[{{$i}}][gender]" value="Male" required>
            <label class="form-check-label" for="genderM">Male</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="childern[{{$i}}][gender]" value="Female" required>
            <label class="form-check-label" for="genderF">Female</label>
          </div>
          

          </p>
          @endfor
          
          <div class="form-group col-md-6">
            <button type="submit" class="btn btn-primary">Next</button>
          </div>
        </form>
        @endif
      </div>
    </div>
  </body>
</html>






