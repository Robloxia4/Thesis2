<!DOCTYPE html>
<html lang="en" style="position: relative;min-height: 100%;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="stylesheet" href={{ URL::asset('css/ClientCSS/Footer-Clean.css') }}>
    <link rel="stylesheet" href={{ URL::asset('css/ClientCSS/Header-Blue.css') }}>
    <link rel="stylesheet" href={{ URL::asset('css/ClientCSS/styles.css') }}>

</head>

<body style="margin: 0 0 169px;">
    <input type="hidden" id = "current_resident" data-id = {{ session("resident.id") }}>
    
    @include('inc.client_nav')

    <div class="container" style="margin-top: 20px;align-items: center;margin-bottom: 70px;">
        <div class="row" style="align-items: center;">
            <div class="col-md-6">
                <div class="carousel slide" data-ride="carousel" id="carousel-1" style="background-size: cover;">
                    <div class="carousel-inner">
                        <div class="carousel-item active"><img class="w-100 d-block" src="{{ URL::to('images/city.jpg') }}" alt="Slide Image"></div>
                        <div class="carousel-item"><img class="w-100 d-block" src="{{ URL::to('images/city1.png') }}" alt="Slide Image"></div>
                        <div class="carousel-item"><img class="w-100 d-block" src="{{ URL::to('images/city2.png') }}" alt="Slide Image"></div>
                    </div>
                    <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev"><span class="carousel-control-prev-icon"></span><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button" data-slide="next"><span class="carousel-control-next-icon"></span><span class="sr-only">Next</span></a></div>
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-1" data-slide-to="1"></li>
                        <li data-target="#carousel-1" data-slide-to="2"></li>
                    </ol>
                </div>
            </div>
            <div class="col-md-6">
                <p><br>VISION<br>An empowered and healthy Negrense in a globally-competitive, ecologically balanced and peaceful Negros Occidental under a responsive and accountable governance.<br><br>MISSION<br>We shall sustain our delivery of services to the fullest of our abilities, harnessing our potentials, and building more meaningful teamwork;

We will hold and promote at all times the principles and policies of the Provincial Government; and

Cognizant of our avowed purpose, we commit ourselves to make Negros Occidental a challenge to the adventurous, a haven for the travelers, and a real home for the Negrense.<br><br></p>
            </div>
        </div>
    </div>
    <br><br>
    <footer class="footer-clean" style="background-color: blue;position: absolute;left: 0;bottom: 0;height: 174px;width: 100%;overflow: hidden;margin-top: 30px;">
        <div class="container text-white">
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
                    <p class="copyright">Brgy.Tan-awan Management System © 2022</p>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>