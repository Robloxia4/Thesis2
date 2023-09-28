<!DOCTYPE html>
<html lang="en" style="position: relative;min-height: 100%;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Clearance</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="stylesheet" href={{ URL::asset('css/ClientCSS/Contact-Form-Clean.css') }}>
    <link rel="stylesheet" href={{ URL::asset('css/ClientCSS/Footer-Clean.css') }}>
    <link rel="stylesheet" href={{ URL::asset('css/ClientCSS/Header-Blue.css') }}>
    <link rel="stylesheet" href={{ URL::asset('css/ClientCSS/styles.css') }}>
</head>

<body style="margin: 0 0 100px;">
    <input type="hidden" id = "current_resident" data-id = {{ session("resident.id") }}>

    @include('inc.client_nav')
    
    <section class="contact-clean" style="padding-bottom: 140px;">
           <!--FORM-->
        <form action="/barangay/certificate" method="post">
            @csrf
            <input hidden  type="text" value="{{ session("resident.id") }}" id="resident_id" name="resident_id">
            <h2 class="text-center">Certificate Request Form</h2>
            <label style="font-weight: bold;">Name</label>
            <div class="form-group">
                <input class="form-control" type="text" name="name" placeholder="Enter Name" >
                @error('name')
                <span class="text-danger error_text"> {{ $message }}</span>
                @enderror
            </div>
            <label style="font-weight: bold;">Age</label>
            <div class="form-group">
                <input class="form-control" type="number" name="age" placeholder="Enter age" onkeypress="return isNumberKey(event)">
                @error('age')
                <span class="text-danger error_text"> {{ $message }}</span>
                @enderror
            </div>
            <label style="font-weight: bold;">Gender</label>
            <div class="form-group border solid pt-2 pl-2">
                <input readonly type="radio" id="male" name="gender" value="Male">
                <label for="male">Male</label><br>
                <input readonly type="radio" id="female" name="gender" value="Female">
                <label for="female">Female</label>
                @error('gender')
                <span class="text-danger error_text"> {{ $message }}</span>
                @enderror
            </div>

            <label style="font-weight: bold;">Description</label>
            <div class="form-group"><textarea class="form-control" name="Description" placeholder="Write Description" rows="14" required="" minlength="10" maxlength="500"></textarea></div>
            <label style="font-weight: bold;">Certificate Type</label>





            <select name="request_type" class="form-control">


                    @if(count($certificate ) > 0)
                    @foreach ($certificate  as $certificate )
                    <option value="{{  $certificate->certificate_type 	}}" >{{ $certificate->certificate_type 	 }}</option>
                    @endforeach
                    @endif
                </select>

            <div class="form-group"><button class="btn btn-primary" type="submit">send </button></div>
        </form>
    </section>
    <footer class="footer-clean" style="background-color: gray;position: absolute;left: 0;bottom: 0;height: 174px;width: 100%;overflow: hidden;margin-top: 30px;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-4 col-md-3 item">
                    <h3>Services</h3>
                    <ul>
                        <li><a href="#">Web design</a></li>
                        <li><a href="#">Development</a></li>
                        <li><a href="#">Hosting</a></li>
                    </ul>
                </div>
                <div class="col-sm-4 col-md-3 item">
                    <h3>About</h3>
                    <ul>
                        <li><a href="#">Company</a></li>
                        <li><a href="#">Team</a></li>
                        <li><a href="#">Legacy</a></li>
                    </ul>
                </div>
                <div class="col-sm-4 col-md-3 item">
                    <h3>Careers</h3>
                    <ul>
                        <li><a href="#">Job openings</a></li>
                        <li><a href="#">Employee success</a></li>
                        <li><a href="#">Benefits</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 item social"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-instagram"></i></a>
                    <p class="copyright">Company Name © 2017</p>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>
