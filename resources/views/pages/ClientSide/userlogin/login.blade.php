<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link href=" {{ URL::asset('css/app.css') }}" rel="stylesheet">
  <link href=" https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" rel="stylesheet">

  <link rel="stylesheet" href={{ URL::asset('css/ClientCSS/Footer-Clean.css') }}>
  <link rel="stylesheet" href={{ URL::asset('css/ClientCSS/Header-Blue.css') }}>
  <link rel="stylesheet" href={{ URL::asset('css/ClientCSS/styles.css') }}>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>

  <script>
    
  </script>

  <title>Login</title>
</head>
<body style="background-image: url({{ URL::asset('images/city.jpg') }}); background-repeat:no-repeat; background-size: cover ">

@include('inc.client_nav_login')

<div class="container mt-5">
  <div class="row justify-content-center" >
    <div class="col-sm-9 col-md-7 col-lg-7">
      <div class="card card-signin my-5">
        <div class="card-body">
          @if (session()->has("success_register"))
          <div class="alert alert-success">
            {{ session()->get("success_register")}}
          </div>
          @endif
          <h5 class="card-title text-center">Log In</h5>
          {{-- form --}}
          <form class="log-in-form" action="/barangay/login" method="post"> 
            @csrf
            <div class="form-label-group mt-2">
              <label for="client_login_email">Email address</label>
              <input type="text" id="client_login_email" name="client_login_email" class="form-control" placeholder="Email address" autofocus
              value={{ old('client_login_email')}}>
              @error('client_login_email')
              <span class="text-danger error_text create_account_form_lastname_error"> {{ $message }}</span>
              @enderror
            </div>

            <div class="form-label-group mt-2">
              <label for="client_login_password">Password</label>
              <input type="password" id="client_login_password" name="client_login_password" class="form-control" placeholder="Password" >
              @error('client_login_password')
              <span class="text-danger error_text create_account_form_lastname_error">{{ $message }}</span>
              @enderror
              <br><a href="/barangay/forgot_password">Forgot your password?</a>
            </div>

            <button class="btn btn-lg btn-success btn-block text-uppercase mt-3" id="clientLoginBtn" type="submit">Log in</button>
          </form>
          {{-- end form --}}


          <br><a href="/barangay/register">Don't have an account?? Register!</a>
          <br><a href="/login">Go to admin login</a>
        </div>
      </div>
      <br><br><br><br>
    </div>
  </div>
</div>


</body>
</html>
