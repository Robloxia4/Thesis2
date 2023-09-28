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

  <title>Forgot Password</title>
</head>
<body style="background-image: url({{ URL::asset('images/background.png') }}); background-repeat:no-repeat; background-size: cover ">

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
          <h5 class="card-title text-center">Message</h5>
          <p>Please contact the barangay to have a new password. Sorry for the inconvenience.</p>

          <br><a href="/barangay/register">Don't have an account?? Register!</a>
          <br><a href="/barangay/login">< Back to login page</a>
        </div>
      </div>
      <br><br><br><br>
    </div>
  </div>
</div>


</body>
</html>
