<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- CSRF Token -->
      <meta name="csrf-token" content="Jdz2Nt81vICwQcsqGkQwPqH62RVSAdyFPg0iUonZ">
      <meta name="publishable-key" content="53qa9X3DA6z88E9T">
      <title>Trips</title>
      <!-- Bootstrap -->
      <link href="https://dev.snowflakeclub.org/front-end/css/bootstrap.min.css" rel="stylesheet">
      <link href="https://dev.snowflakeclub.org/front-end/css/bootstrap.offcanvas.min.css" rel="stylesheet">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="https://dev.snowflakeclub.org/plugins/font-awesome/css/font-awesome.min.css">
      <!-- Ionicons -->
      <link rel="stylesheet" href="https://dev.snowflakeclub.org/plugins/Ionicons/css/ionicons.min.css">
      <link rel="stylesheet" href="https://dev.snowflakeclub.org/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
      <link href="https://dev.snowflakeclub.org/front-end/css/animate.css&quot; rel=&quot;stylesheet">
      <link href="https://dev.snowflakeclub.org/front-end/css/style.css" rel="stylesheet">
      <link href="https://dev.snowflakeclub.org/toastr/css/toastr.css" rel="stylesheet" type="text/css"/>
      <link rel="stylesheet" href="https://dev.snowflakeclub.org/plugins/select2/dist/css/select2.min.css">
      <link rel="stylesheet" href="https://dev.snowflakeclub.org/css/alt/AdminLTE-select2.min.css">

   </head>
   <body>
      <div id="page">
         <div id="wrapper" class="">
            <header id="header" class="bg-cover wow fadeIn" style="background: black;    background-size: cover;
               background-position-y: center;">
               <img src="https://dev.snowflakeclub.org/front-end/iamges/trip.jpg" alt="Banner" style="    background-size: cover;
                  background-position: 50% 62%;">
               <style>
                  .bg-cover {
                  background: url(https://dev.snowflakeclub.org/front-end/iamges/trip.jpg) !important;
                  background-size: cover !important;
               </style>
               <nav class="navbar navbar-default">
                  <div class="container-fluid clearfix">
                     <div class="navbar-header alignleft">
                        
                        <a class="navbar-brand" href="https://dev.snowflakeclub.org"><img
                           src="https://dev.snowflakeclub.org/front-end/images/snowflake-logo.png"
                           alt="Snowflake Club Logo"></a>
                     </div>
                     <div class="collapse navbar-collapse navbar-offcanvas navbar-offcanvas-touch alignright"
                        id="js-bootstrap-offcanvas">
                        <ul class="nav navbar-nav">
                           <li><a href="#">Welcome</a></li>
                           <li><a href="/login" class="btn btn-style1">Login</a></li>
                        </ul>
                     </div>
                     <!-- /.navbar-collapse -->
                  </div>
                  <!-- /.container -->
               </nav>
               <div class="banner">
                  <div class="d-t">
                     <div class="d-tc">
                        <div class="container">
                           <h1>TRIP SCHEDULE</h1>
                        </div>
                     </div>
                  </div>
               </div>
            </header>
            <main id="main">
               <div class="container">
                  <div class="row page-wapper top-btm-gutter9">
                     <aside class="col-md-3 sidebar">
                        <span class="toggle-btn"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span><span
                           class="glyphicon glyphicon-minus" aria-hidden="true"></span></span>
                        <div class="toggle-block">
                           <h3>General Information</h3>
                           <ul class="links-list">
                              <li><a href="#">What We Do</a></li>
                              <li class="active"><a
                                 href="#">Trip Schedule</a></li>
                              <li class=""><a
                                 href="#">Bus Stops</a></li>
                              <li class=""><a
                                 href="#">Ski Areas</a></li>
                              <li class="">
                                 <a href="#">Instructor List</a>
                              </li>
                              <li class=""><a
                                 href="#">Cancellation Policy</a></li>
                              <li class=""><a
                                 href="#">Ski Tip</a></li>
                              <li class=""><a
                                 href="#">Contact</a></li>
                              <li class=""><a
                                 href="3">FAQ</a></li>
                           </ul>
                        </div>
                     </aside>
                     <div class="col-md-9 content-holder scheduel-block">
                        <div class="title text-center btm-gutter3">
                           <div class="alerts m-t-10">
                           </div>
                           <h3> TRIP SCHEDULE</h3>
                           <br>
                           
                        </div>
                        <div class="table-responsive">
                           <table class="table">
                           @foreach($trips as $trip)
                              
                                 <tr>
                                    <td>{{ $trip->departure_date }}</td>
                                    <td>{{ $trip->return_date }}</td>
                                    <td>{{ $trip->trip_name }}</td>
                                    <td style="border: none">
                                       <a  href={{"trip_detail/".$trip['id']}} class="btn btn-primary open_trip_model" style="padding: 5px 10px 3px 10px;">Buy</a>
                                    </td>
                                 </tr>
                                 
                              
                              @endforeach
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
            </main>
            <footer id="footer" class="text-center">
               <div class="footer-top">
                  <div class="container">
                     <ul class="list-inline footer-menu">
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                     </ul>
                  </div>
               </div>
            </footer>
         </div>
      </div>

   </body>
</html>