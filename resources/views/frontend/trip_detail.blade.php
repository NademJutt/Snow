@extends('layoutcustomer.main')

@section('content')

<script> 
  $(document).ready(function(){
    $(".checkbox").click(function(){

    });
  });

</script>

<div class="main-panel">
  <div class="content-wrapper">
    
  <h2> Buy Trip </h2>

   
    @include('errors')

    <br>

    <!-- Main content -->

    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h3>

            <p>Trip Name : {{ $trip->trip_name }}</p>

            <p>Price for 1 child :      {{ $trip->price }}</p>

          </h3>

          <form action="/store_order" method="post">
            @csrf

            <input type="hidden" name="trip_price" value="{{ $trip->price }}">

            @foreach($kids as $kid)

            <input type="checkbox" class="checkbox" name="kid" value="kid[{{ $kid->id }}]">

            {{ $kid->first_name }} {{ $kid->last_name }}

            <br>

            @endforeach

            <br>

            <button type="submit" class="btn btn-primary">Buy</button>

          </form>


        </div>
      </div>
    </div>
    
    <!-- /.content -->  

  </div>
</div>
 

@endsection



















