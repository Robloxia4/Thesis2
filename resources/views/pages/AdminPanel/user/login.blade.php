<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link href=" {{ URL::asset('css/app.css') }}" rel="stylesheet">
  <link href=" https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" rel="stylesheet">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>

  <title>Login</title>
</head>
<body style="background-image: url({{ URL::asset('images/background.png') }}); background-repeat:no-repeat; background-size: cover ">
  <h1 class="text-white m-4">Admin Login</h1>
<div class="container">
  <div class="row">
    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
      <div class="card card-signin my-5">
        <div class="card-body">
          <h5 class="card-title text-center">Log In</h5>
          {{-- form --}}
          <form class="log-in-form" action="login" method="post">
            @csrf
            <div class="form-label-group mt-2">
              <label for="login_email">Email address</label>
              <input type="text" id="login_email" name="login_email" class="form-control" placeholder="Email address" autofocus
              value={{ old('login_email')}}>
              @error('login_email')
              <span class="text-danger error_text create_account_form_lastname_error"> {{ $message }}</span>
              @enderror
            </div>

            <div class="form-label-group mt-2">
              <label for="login_password">Password</label>
              <input type="password" id="login_password" name="login_password" class="form-control" placeholder="Password" >
              @error('login_password')
              <span class="text-danger error_text create_account_form_lastname_error">{{ $message }}</span>
              @enderror
            </div>

            <button class="btn btn-lg btn-primary btn-block text-uppercase mt-3" id="loginBtn" type="submit">Log in</button>
          </form>
          {{-- end form --}}
          <br><a href="/barangay/login">Go to client login ></a>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>
