<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\area_setting;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\Certificate_request;
class PagesController extends Controller

{
    //

    public function  sampledata(){

        $area_setting = DB::table('area_settings')
        ->where('area','=','gitna')->first();
        $request_list = Certificate_request::where('resident_id','=',session("resident.id"))->orderBy('created_at', 'desc')->first();

       // echo $add + $area_setting->population;
      //  echo $request_list->request_id;
        echo "<br>";
        $resident_area = DB::table('area_settings')
        ->where('area','=','gitna')->count();

       // echo $resident_area;
       $sss = DB::table('area_settings')
       ->where('area','=','14')
       ->get();
       echo $sss;
       echo "dasa";


       $data = DB::table('area_settings')
       ->select('area')->get();

       if(count($data))
        foreach ($data as $data) {

            $test = DB::table('resident_infos')
            ->where('area','=',$data->area)->count();

            area_setting::where('area', '=', $data->area)
           ->update(['population' => $test]);

            echo $test;
            echo "<br>";


        }


        $deletefile = DB::table('certificate_layouts')
        ->where('layout_id','=',1)
        ->first();



        echo "<br>";

        $position = DB::table('brgy_officials')->WHERE('position','=','Punong Barangay')->FIRST();
        echo $position->position;
        if(!($position->position == 'Punong Barangay' || $position->position == 'Barangay Secretary')  ){
            echo "exist";
        }else{

            echo "not";
        }

/*
      $deletefile = DB::table('certificate_layouts')
      ->where('layout_id','=',1)
      ->first();
      if ($deletefile !== null) {
          $deletefile = DB::table('certificate_layouts')
      ->where('layout_id','=',1)
      ->first();
      echo  $deletefile->logo_1;
      Storage::delete($deletefile->logo_1);
      Storage::delete($deletefile->logo_2);
      Storage::delete($deletefile->punongbarangay);
       }


*/



       /*



// try this after software

        Flight::where('active', 1)
      ->where('destination', 'San Diego')
      ->update(['delayed' => 1]);












        $area_setting = $area_setting->get();
        foreach ($area_setting as $area_setting) {
            $add +=  $area_setting->population;
        }
        foreach ($area_setting as $area_setting) {
            echo $add;
        }
*/
    }public function invoice(){

        $pdf = PDF::loadView('invoice');
        return $pdf->download('invoice.pdf');
        // $data = DB::table('sessions')
        // ->select('username')
        // ->where('user_id', '=', 1);

        // $test = DB::table('sessions')
        // ->where('user_id', '=', 1)
        // ->update(['username' => "giannpogi"]);


        echo "running";




    }


    public function ajaxCall($page){

        if(Request::ajax()) {
           return view('content.'.$page)->render();
        } else {

        }
    }


    public function  dashboard(Request $request){

        if($request->ajax()){
            //ajax call
            return view('pages.dashboard')->render();
        }
        //http
        return view('pages.dashboard')->render();

    }

    public function  blotter(){

        return view('pages.blotter');

    }

    public function  schedule(){

        return view('pages.schedule');

    }
    public function  certificate(){

        return view('pages.certificate');

    }

    public function  account(){

        return view('pages.setting.account');

    }

    public function  maintenance(){

        return view('pages.setting.maintenance');

    }

    public function jakol(){

    }
}
