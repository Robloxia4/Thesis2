<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="application/pdf; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

 </head>
<body class="login-page" style="background: white">



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
                   THIS IS TO CERTIFY THAT __________________, _____ years old, ______ and a resident of <span id="firstcontent">{{ $content->content_1 ?? 'Paragraph not set' }}</span>
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
                      Done and issued this  ___ day of _______________ at the <span id="thirdcontent">{{ $content->content_1 ?? 'Paragraph not set' }}</span>
                    </span>
              </div>

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
                              <p >: </p>
                              <p >: P {{ $content->price ?? 'Paragraph not set' }}</p>
                              <p >:</p>
                            </div>
                        </div>
                    </div>

                </div>
                 <div class="text-center column-inside-right " style="font-size: 17px ; font-family: Arial, Helvetica, sans-serif;  ">
                    <span>APPROVE BY:<br></span>
                    @if(count($approve))
                    @foreach ($approve as $approve)
                    <span class="text-center" style="text-transform: uppercase;
                       text-align:center">{{ $approve->name }}</span><span>{{ $approve->position }}<span>
                    @endforeach
                    @endif
                 </div>
              </div>
              <footer><span><i>***This is a computer-generated document. No signature is required***</i></span></footer>
           </div>
        </div>
     </div>




</body>






</html>

<style>

.box{
        position: relative;
       /* Make the width of box same as image */
    }
    .box .text{
        position: absolute;
        z-index: 999;
        margin: 0 auto;
        left: 0;
        right: 0;
        top: 0%; /* Adjust this value to move the positioned div up and down */
        text-align: center;
        width: 100%; /* Set the width of the positioned div */
    }
.background-opacity {
  opacity: 0.3;
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
    .column-label {
      float: left;
      width: 100%;
      padding: 0px;
      /* Should be removed. Only for demonstration */
    }
    .column-data {
      float: left;
      width: 1%;
      padding: 0px;
      /* Should be removed. Only for demonstration */
    }
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

<!----------------
    <div class="container-fluid " style="width:100%">
	<div class="row">


		<div class="col-md-12 text-center">
			<div class="row">

				<div class="col-md-3 text-right">
                    <img  style="width: 100PX"src="{{ url('/logo/logo1.png') }}">


                </div>

				<div class="col-md-6 ">
                    BARANGAY NAME
                </div>

				<div class="col-md-3 text-left">
                    <img  style="width: 100px"src="{{ url('/logo/logo2.png') }}">
                </div>

			</div>
		</div>
    </div>


		<div class="col-sm-12">
			<div class="row">


				<div class="col-sm-4 " >
                    <p>KAGAWAD<p>
                </div>

				<div class="col-sm-8" >
                    <p>LOREM IPSUM<p>
                </div>



			</div>
		</div>

</div>

-->
