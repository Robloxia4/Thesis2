<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
 </head>
<body class="login-page" style="background: white">



    <div class="row">
      <div class="column-right text-right" >
        <img  style="width: 120PX" src="{{  public_path('logo/logo1.jpg') }}" alt="logo">
      </div>
      <div class="column-center text-center" >
       <p style='font-size:19px;font-family: "Times New Roman, Times, serif"; text-align: center;'> REPUBLIC OF THE PHILIPPINES<br>
        MUNICIPALITY OF BARAS<br>
        PROVINCE OF RIZAL<br>
         <b style="text-align: center;"><u>BARANGAY CONCEPCION</u></b>
        </p>
        <div style='font-size:22px;font-family: "Times New Roman, Times, serif"; text-align: center;'><b>EXTRACT COPY FROM BARANGAY BLOTTER</b>

        </div>

      </div>

      <div class="column-left" >
        <img  style="width: 120PX" src="{{  public_path('logo/logo2.jpg') }}" alt="logo">
      </div>
    </div>


    <div class="content">

      <h4 style="margin-bottom: 2.5rem;"><b>TO WHOM IT MAY CONCERN:</b></h4>
      <h4><b style="margin-left: 5rem;">THIS IS TO CERTIFY</b> that as per record available in the Barangay BLotter on Barangay Conception, the following data exixts:</h4>

      <div style="margin-top: 2rem;" class="data-row">
          <div class="data-row-1">
              <h4>BLotter No</h4>
              <h4>Date Reported</h4>
              <h4>Time Reported</h4>
          </div>

          <div class="data-row-2" style="text-align: center; ">
              <h4>:{{ $data[0]->blotter_id }}</h4>
              <h4>:{{ $data[0]->date_reported }}</h4>
              <h4>:{{ $data[0]->time_reported }}</h4>
          </div>
        
      </div>

      <h4><b>FOR RECORD:</b></h4>

      <h4 style="text-align: center; margin-bottom: 4rem;"><b>"{{ $data[0]->incident_type }}"</b></h4>
                      
      <div class="row">
        <div class="col-sm-3" >
          <h4>Complainants</h4>
        </div>

        <div class="col-sm-8" >
          @for ($i = 0; $i < $complainant->count(); $i++)
            <h4>: {{ $complainant[$i]->person_involve }}</h4>
          @endfor
         </div>
      </div>

      <div class="row">
        <div class="col-sm-3" >
          <h4>Respondents</h4>
        </div>

          <div class="col-sm-8" >
          @for ($i = 0; $i < $respondent->count(); $i++)
            <h4>: {{ $respondent[$i]->person_involve }}</h4>
          @endfor
         </div>
      </div>

      <div class="row">
        <div class="col-sm-3" >
          <h4>Victims</h4>
        </div>

        <div class="col-sm-8" >
          @for ($i = 0; $i < $victim->count(); $i++)
            <h4>: {{ $victim[$i]->person_involve }}</h4>
          @endfor
         </div>
      </div>

      <div class="row">
        <div class="col-sm-3" >
          <h4>Attackers</h4>

        </div>

        <div class="col-sm-8" >
          @for ($i = 0; $i < $attacker->count(); $i++)
            <h4>: {{ $attacker[$i]->person_involve }}</h4>
          @endfor
         </div>
      </div>

      <div class="row">

        <div class="col-sm-3" >
          <h4>Occurence</h4>
        </div>

        <div class="col-sm-8" >
          <h4>: {{ $data[0]->time_incident }} of {{ $data[0]->date_incident }} at {{ $data[0]->incident_location }}</h4>
         </div>

      </div>

      <div class="row">

        <div class="col-sm-3" >
          <h4>Narrative Report</h4>
        </div>

        <div class="col-sm-8" >
          <h4>: <span style="margin-left: 2rem;"></span> {{ $data[0]->incident_narrative }}</h4>
         </div>

      </div>

      <div style="text-align: right;">
        <h4><b>RONALDO PLECRIDA</b></h4>
        <h4>Barangay Captain</h4>
    </div>
      
   
      </div>






</body>

</html>

<style>
    * {
      box-sizing: border-box;
    }

   
    .column-left {
      float: left;
      width: 20%;
      padding: 0px;
      height: 190px;
    }
    .column-center {
      float: left;
      width:60%;
      padding: 0px;
      height: 190px; 
    }
    .column-right {
      float: left;
      width: 20%;

      height: 190px; 
    }

    .data-row{
      float: left;
      width: 100%;
      margin-bottom: 2rem;
    }

    .data-row .data-row-1{
      float: left;
    }

  


    </style>

