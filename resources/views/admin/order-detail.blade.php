@extends('layoutadmin.main')

@section('content')  

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-5"> 
          <h1 class="m-0">Order's Kids</h1>
        </div>
        <div class="col-sm-4"> 

           
          
        </div>
        <div class="col-sm-3">
          <ol class="breadcrumb float-sm-right">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddModal">
              #
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
          <h5 class="modal-title" id="exampleModalLabel">#</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form action="/store-customer" method="post">
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
                  <th>Category</th>
                  <th>Experience</th>
                  <th>Date of Birth</th>
                  <th>Phone #</th>
                  <th>Gender</th>
                  <th>Action</th>
                </tr>
                @foreach($order->childrens as $kid)
                <tr>
                  <td>{{ $kid->id }}</td>
                  <td>{{ $kid->first_name }} {{ $kid->last_name }}</td>
                  <td>{{ $kid->category }}</td>
                  <td>{{ $kid->experience }}</td>
                  <td>{{ $kid->dob->format('m/d/y') }}</td>
                  <td>{{ $kid->childphone }}</td>
                  <td>{{ $kid->gender }}</td>
                  <td>
                    <a href={{"#".$order['id']}}>  <i class="nav-icon fa fa-eye" ></i> </a>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#EditModal{{ $order->id }}"> <i class="nav-icon fa fa-edit" ></i> </a>
                    <a href={{"#".$order['id']}}><i class="nav-icon fa fa-trash" ></i> </a>
                  </td>
                  <!-- EditModal -->
                  <div class="modal fade" id="EditModal{{ $order->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Update Customer</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                          <form action="{{url('/')}}/update-customer/{{ $order->id }}" method="post">
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

   