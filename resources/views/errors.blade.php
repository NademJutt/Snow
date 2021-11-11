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

    @if ($errors->any())
      <div class="alert alert-danger" >
          <ul class="list-unstyled" style="margin-bottom: 0;">
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif