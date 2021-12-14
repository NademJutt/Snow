<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Customer Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('customer/vendors/feather/feather.css') }}">
  <link rel="stylesheet" href="{{ asset('customer/vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('customer/vendors/css/vendor.bundle.base.css') }}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{ asset('customer/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
  <link rel="stylesheet" href="{{ asset('customer/vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('customer/js/select.dataTables.min.css') }}">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('customer/css/vertical-layout-light/style.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('customer/images/favicon.png') }}" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
  <link rel="stylesheet" type="text/css" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

</head>

<script>
  $(document).ready(function(){
    $("#date").datepicker({dateFormat:'mm/dd/yy'});
  });
</script>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
      
        <div class="navbar-nav navbar-nav-right">

              <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-top:11px; width:159px">
                  <?php $user_name = Sentinel::getUser()->first_name ?>
                  {{ $user_name }}
                </button>
                <div class="dropdown-menu">
                  <form action="/logout" method="post" id="logout-form">
                    @csrf
                    <a href="#" onclick="document.getElementById('logout-form').submit()" class="dropdown-item">
                      Logout
                    </a>
                  </form>
                </div>
              </div>
              
              
                   
        </div>
      </div>
    </nav>


    <div class="container-fluid page-body-wrapper">

      <!-- Dashboard -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="/customer_dashboard">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li> 
          <li class="nav-item">
            <a class="nav-link" href="/children">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Children</span>
            </a>
          </li> 
          <li class="nav-item">
            <a class="nav-link" href="/orders">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Orders</span>
            </a>
          </li> 
          <li class="nav-item">
            <form action="/logout" method="post" id="logout-form">
              @csrf
              <a href="#" onclick="document.getElementById('logout-form').submit()" class="nav-link">
                <i class="icon-head menu-icon"></i>
                <span class="menu-title">Logout</span>
              </a>
            </form>
          </li>   
        </ul>
      </nav>
      <!--/. Dashboard -->

        @yield('content')

  <!-- plugins:js -->
  <script src="{{ asset('customer/vendors/js/vendor.bundle.base.js') }}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{ asset('customer/vendors/chart.js/Chart.min.js') }}"></script>
  <script src="{{ asset('customer/vendors/datatables.net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('customer/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
  <script src="{{ asset('customer/js/dataTables.select.min.js') }}"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{ asset('customer/js/off-canvas.js') }}"></script>
  <script src="{{ asset('customer/js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('customer/js/template.js') }}"></script>
  <script src="{{ asset('customer/js/settings.js') }}"></script>
  <script src="{{ asset('customer/js/todolist.js') }}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{ asset('customer/js/dashboard.js') }}"></script>
  <script src="{{ asset('customer/js/Chart.roundedBarCharts.js') }}"></script>
  <!-- End custom js for this page-->
</body>

</html>

