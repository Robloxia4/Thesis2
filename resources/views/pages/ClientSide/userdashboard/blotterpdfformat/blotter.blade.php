<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
 </head>
<body class="login-page" style="background: white">



    <div class="row">

      <div class="column-right text-right" >
        <img  style="width: 120PX" src="http://{{  request()->getHost()}}{{  Storage::url( $certificate_layout[0]->logo_1 ?? 'Logo not set')  }}" alt="logo">
      </div>
      <div class="column-center text-center" >
       <p style='font-size:19px;font-family: "Times New Roman, Times, serif"; text-align: center; text-transform: uppercase;'> REPUBLIC OF THE PHILIPPINES<br>
        MUNICIPALITY OF {{ $certificate_layout[0]->municipality ?: 'Not Set'}}<br>
        PROVINCE OF {{ $certificate_layout[0]->province ?: 'Not Set'}}<br>
         <b style="text-align: center;"><u>BARANGAY {{ $certificate_layout[0]->barangay ?: 'Not Set'}}</u></b>
        </p>
        <div style='font-size:22px;font-family: "Times New Roman, Times, serif"; text-align: center;'><b>EXTRACT COPY FROM BARANGAY BLOTTER</b>
        </div>
      </div>
      <div class="column-left" >
        <img  style="width: 120PX"  src="http://{{  request()->getHost()}}{{  Storage::url( $certificate_layout[0]->logo_2 ?? 'Logo not set')  }}"  alt="logo">
      </div>

    </div>

    <div class="content">

      <h4 style="margin-bottom: 1.5rem;"><b>TO WHOM IT MAY CONCERN:</b></h4>

      <h4><b style="margin-left: 5rem;">THIS IS TO CERTIFY</b> that as per record available in the Barangay BLotter on Barangay {{ $certificate_layout[0]->barangay ?: 'Not Set' }}, the following data exixts:</h4>



      <div style="margin-top: 1.5rem;" class="data-row">
          <div class="data-row-1">
              <p><b>Blotter No</b></p>
              <p><b>Date Reported</b></p>
              <p><b>Time Reported</b></p>
          </div>

          <div class="data-row-2" style="text-align: center; ">
              <p>:{{ $data[0]->blotter_id }}</p>
              <p>:{{ $data[0]->date_reported }}</p>
              <p>:{{ $data[0]->time_reported }}</p>
          </div>

      </div>

      <p><b>FOR RECORD:</b></p>

      <p style="text-align: center; margin-bottom: 1rem;"><b>"{{ $data[0]->incident_type }}"</b></p>

      <div class="row" style="margin-bottom: 1rem;">
        <div class="col-sm-3" >
          <span style="display:inline-block; margin-right: 2rem;"><b>Complainants</b></span>
          @for ($i = 0; $i < $complainant->count(); $i++)
          <span><b>:</b> {{ $complainant[$i]->person_involve }}</span>
        @endfor
        </div>
      </div>

      <div class="row" style="margin-bottom: 1rem;">
        <div class="col-sm-3" >
          <span style="display:inline-block; margin-right: 2.6rem;"><b>Respondents</b></span>
          @for ($i = 0; $i < $respondent->count(); $i++)
          <span><b>:</b> {{ $respondent[$i]->person_involve }}</span>
        @endfor
        </div>
      </div>

      <div class="row" style="margin-bottom: 1rem;">
        <div class="col-sm-3" >
          <span  style="display:inline-block; margin-right: 4.8rem;"><b>Victims</b></span>
          @for ($i = 0; $i < $victim->count(); $i++)
          <span><b>:</b> {{ $victim[$i]->person_involve }}</span>
        @endfor
        </div>
      </div>

      <div class="row" style="margin-bottom: 1rem;">
        <div class="col-sm-3" >
          <span  style="display:inline-block; margin-right: 3.9rem;"><b>Attackers</b></span>
          @for ($i = 0; $i < $attacker->count(); $i++)
          <span><b>:</b> {{ $attacker[$i]->person_involve }}</span>
        @endfor
        </div>
      </div>

      <div class="row">

        <div class="col-sm-3" >
          <span style="display:inline-block; margin-right: 3.6rem;"><b>Occurence</b></span>
          <span><b>:</b> {{ $data[0]->time_incident }} of {{ $data[0]->date_incident }} at {{ $data[0]->incident_location }}</span>
        </div>
      </div>

      <div class="row">

        <div class="col-sm-3" >
          <p><b>Narrative Report</b></p>
        </div>

        <div class="col-sm-8" >
          <p>: <span style="display:inline-block; margin-left: 4rem;"></span> {{ $data[0]->incident_narrative }}</p>
         </div>

      </div>

      <div style="text-align: right;">
        <p><b>RONALDO PLECRIDA</b></p>
        <p>Barangay Captain</p>
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
