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
    font-family: serif;
  }
  button{ 
    font-size: 25px;
    margin-top: 15px;
    background-color: #008CBA;
    border: none;
    border-radius: 20px;
    padding: 13px 18px;
    color: #fff;
  }
  .header{
    width: 100%;

  }

  .nav>li>a.btn {
    padding: 1rem 1.8rem;
    color: #fff;
}
.navbar-default .navbar-nav>li>a {
    color: #fff;
    text-transform: uppercase;
    font-family: 'Proxima Nova Rg', sans-serif;
    font-size: 1.3rem;
    font-weight: 600;
    letter-spacing: .2rem;
}
.navbar-default .navbar-nav>li>a {
    color: #777;
}
.btn.btn-style1 {
    border-color: #ccc;
    color: #fff;
}
.navbar-nav>li>a {
    padding-top: 10px;
    padding-bottom: 10px;
    line-height: 20px;
}
.btn {
    font-weight: 600;
    font-style: normal;
    text-transform: uppercase;
    letter-spacing: .1rem;
    border: 0.2rem solid #b91818;
    border-radius: 10rem;
}









  input[type=number]::-webkit-inner-spin-button, 
  input[type=number]::-webkit-outer-spin-button { 
  -webkit-appearance: none; 
     margin: 0; 
  }

  </style>

  <body>

    <div class="header">
      <img src="{{ asset('img/snow.jpg')}}" >

    <nav class="nav navbar-default">
      <div class="container-fluid clearfix">
        <ul class="nav navbar-nav">
          <li>
            <a href="/purchase_trip" class="btn btn-style1">PURCHASE TRIP</a>
          </li>
        </ul>
      </div>
    </nav>

    </div>

    <div class="container">
      <div class="col-md-8 offset-2">

        <h1>Purchase Membership</h1>

        <h6>How many Memberships do you want to buy ? </h6>

        @include('errors')

        <form action="/add_child" method="post" >
          @csrf
          <div class="row">
            <div class="col-md-2">
              <input type="number" id="number_id"  name="memberships" required>
            </div> 
          </div>
          <div>
            <button type="submit" name="next">Next</button>
          </div>          
        </form>

      </div>
    </div>
  </body>
</html>






