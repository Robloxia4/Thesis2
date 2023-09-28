

<!DOCTYPE html>
<html lang="en" style="position: relative;min-height: 100%;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Schedule</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="stylesheet" href={{ URL::asset('css/ClientCSS/Footer-Clean.css') }}>
    <link rel="stylesheet" href={{ URL::asset('css/ClientCSS/Header-Blue.css') }}>
    <link rel="stylesheet" href={{ URL::asset('css/ClientCSS/styles.css') }}>
</head>

<body style="margin: 0 0 100px;">
    <input type="hidden" id = "current_resident" data-id = {{ session("resident.id") }}>

    @include('inc.client_nav')

    <div style="margin: 20px;">
        
            <section class="contact-clean text-center" style="padding-bottom: 140px;">
                <div class="container container-smaller">
                    <div class="row">
                      <div class="col-lg-10 col-lg-offset-1" style="margin-top:20px; text-align: right">
                        <div class="btn-group mb-4">
                          <a href="/barangay/schedule" class="btn btn-success">Back</a>
                        </div>
                      </div>
                    </div>




                    <div class="row">
                      <div class="col-lg-10 col-lg-offset-1">
                          <div class="invoice">




                            <div class="row">
                            <div class="column-right text-right" >
                               <img style="width: 120px" id="logo1create1" class="logo1create1" src="http://{{  request()->getHost()}}{{  Storage::url($layout->logo_1 ?? 'Logo not set')  }}">
                            </div>
                            <div class="column-center text-center" >
                               <p id="heading2" style='font-size:19px;font-family: "Times New Roman, Times, serif";'> REPUBLIC OF THE PHILIPPINES<br>
                                  {{ $layout->municipality ?? 'Municipality not set'  }}<br>
                                  {{ $layout->province ?? 'Province not set'  }}<br>
                                  <b ><u>   {{ $layout->barangay ?? 'Barangay not set'  }}</u></b>
                               </p>
                               <div id="punong2" style='font-size:22px;font-family: "Times New Roman, Times, serif";padding:0px'><b>   {{ $layout->office ?? 'Office not set'  }}</b>
                               </div>
                               <div style='font-size:24px;font-family: "Times New Roman, Times, serif";padding:0px'><u><b>{{ $content->certificate_name ?? 'certificate name not set'}}</b></u>
                               </div>
                            </div>
                            <div class="column-left text-left" >
                               <img style="width: 120px" id="logo2create2" class="logo2create" src="http://{{  request()->getHost()}}{{  Storage::url($layout->logo_2 ?? 'Logo not set')  }}">
                            </div>
                         </div>
                         <div class="box">
                            <img  id="logobackground2" class="background-opacity text-center" style="height: 450px;margin-left: 30%;margin-top: 40px" src="http://{{  request()->getHost()}}{{  Storage::url($layout->logo_2 ?? 'background logo not set')  }}">
                            <div class="row text">
                               <div class="column-body-left text-center " >
                                  <img id="punongbarangay2" style="width: 120px" src="http://{{  request()->getHost()}}{{  Storage::url($layout->punongbarangay ?? '2X2 PIC of punong barangay not set')  }}">
                                  <div class="form-group" style='font-size:16px;font-family: "Times New Roman, Times, serif;'>
                                     @if(count($puno))
                                     @foreach ($puno as $puno)
                                     <p ><b>{{ $puno->name }}</b><br>{{ $puno->position }}</p>
                                     @endforeach
                                     @endif
                                     @if(count($brgy_official))
                                     @foreach ($brgy_official as $brgy_official)
                                     <p ><b>{{ $brgy_official->name }}</b><br>{{ $brgy_official->position }}</p>
                                     @endforeach
                                     @endif
                                  </div>
                               </div>
                               <div class="column-body-right text-left " style="padding-left:5px">
                                  <br>
                                  <br>
                                  <br>
                                  <br>
                                  <span style=" font-size: 17px ; font-family: Arial, Helvetica, sans-serif;"><b>TO WHOM MAY IT CONCERN:</b></span>
                                  <br>
                                  <br>
                                  <br>
                                  <div style="text-align: justify;text-indent: 15px;font-size: 17px ; font-family: Arial, Helvetica, sans-serif;">
                                    <span style=" text-align: justify;text-justify: inter-word; ">
                                       THIS IS TO CERTIFY THAT {{ $request_list->name }}, {{ $request_list->age }} years old, {{ $request_list->gender }} and a resident of <span id="firstcontent">{{ $content->content_1 ?? 'Paragraph not set' }}</span>
                                    </span>
                                </div>

                                    <br>
                                    <div style="text-align: justify;text-indent: 15px;font-size: 17px ; font-family: Arial, Helvetica, sans-serif;">
                                    <span  id="secondcontent">
                                        {{ $content->content_1 ?? 'Paragraph not set' }}
                                    </span>
                                    </div>
                                        <br>

                                    <div  style="text-align: justify;text-indent: 15px;font-size: 17px ; font-family: Arial, Helvetica, sans-serif;">
                                        <span >
                                          Done and issued this  {{ Carbon\Carbon::parse($request_list->created_at)->format('d') }} day of  {{ Carbon\Carbon::parse($request_list->created_at)->format('F, Y ') }} at the <span id="thirdcontent">{{ $content->content_1 ?? 'Paragraph not set' }}</span>
                                        </span>
                                  </div>
                                  <br>
                                  <br>
                                  <br>
                                  <div class="row">
                                     <br>
                                     <br>
                                     <div class="column-inside-left">


                                          <div style="width: 100%; display: table;">
                                            <div style="display: table-row; height: 100px;">
                                                <div style="width: 35%; display: table-cell;">
                                                    <p >O. R. No.</p>
                                                    <p >Amount</p>
                                                    <p >Date Issued</p>
                                                </div>
                                                <div style="display: table-cell;" >
                                                  <p >: {{ $request_list->request_id }} </p>
                                                  <p >: P {{ $content->price ?? 'Paragraph not set' }}</p>
                                                  <p >: {{ Carbon\Carbon::parse($request_list->created_at)->toDateString() }}</p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                     <div class="text-center column-inside-right " style="font-size: 17px ; font-family: Arial, Helvetica, sans-serif;  ">
                                        <span>APPROVE BY:<br></span>
                                        @if(count($approve))
                                        @foreach ($approve as $approve)
                                        <span class="text-center" style="text-transform: uppercase;
                                           text-align:center">{{ $approve->name }}</span><br><span>{{ $approve->position }}<span>
                                        @endforeach
                                        @endif
                                     </div>
                                  </div>
                                  <footer><span><i>***This is a computer-generated document. No signature is required***</i></span></footer>
                               </div>
                            </div>
                         </div>



                            </div>









                        </div>
                      </div>





                    </div>




         </section>









    </div>
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







<style>
    .page-break {
        page-break-after: always;
    }
    .bg-grey {
        background: #F3F3F3;
    }
    .text-right {
        text-align: right;
    }
    .w-full {
        width: 100%;
    }
    .small-width {
        width: 15%;
    }
    .invoice {
        background: white;
        border: 1px solid #CCC;
        font-size: 14px;
        padding: 48px;
        margin: 20px 0;
    }




    * {
      box-sizing: border-box;
    }

    /* Create two equal columns that floats next to each other */
    .column-left {
      float: left;
      width: 25%;
      padding: 0px;
      height: 200px; /* Should be removed. Only for demonstration */
    }
    .column-center {
      float: left;
      width: 50%;
      padding: 0px;
      height: 200px; /* Should be removed. Only for demonstration */
    }
    .column-right {
      float: left;
      width: 25%;
      padding: 0px;
      height: 200px; /* Should be removed. Only for demonstration */
    }

    /* Clear floats after the columns */
    .row:after {
      content: "";
      display: table;
      clear: both;
    }




.box{
position: relative;
/* Make the width of box same as image */
}
.box .text{

z-index: 999;
margin: 0 auto;
left: 0;
right: 0;
top: 0%; /* Adjust this value to move the positioned div up and down */
text-align: center;
width: 100%; /* Set the width of the positioned div */
}
.background-opacity {
opacity: 0.1;
position:absolute;
display: block;
margin-left: auto;
margin-right: auto;

max-width: 100%;
}
* {
box-sizing: border-box;
}

/* Create two equal columns that floats next to each other */
.column-left {
float: left;
width: 20%;
padding: 0px;
height: 190px; /* Should be removed. Only for demonstration */
}
.column-center {
float: left;
width:60%;
padding: 0px;
height: 190px; /* Should be removed. Only for demonstration */
}
.column-right {
float: left;
width: 20%;

height: 190px; /* Should be removed. Only for demonstration */
}
.column-body-left {
float: left;
width: 33%;

height: 818px; /* Should be removed. Only for demonstration */
}
.column-body-right {
float: left;
width: 61%;


height: 818px; /* 818pxShould be removed. Only for demonstration */
}

.column-inside-left {
float: left;
width: 60%;

}
.column-inside-right {
float: right;
width: 40%;

}
/* Clear floats after the columns */
.row:after {
content: "";
display: table;
clear: both;
}

</style>
