<?php

namespace App\Http\Controllers\ClientSide;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\brgy_official;
use App\Models\Certificate_layout;
use App\Models\Certificate_list;
use App\Models\Certificate_request;
class ScheduleClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!session()->has("resident")) {
            return redirect("/barangay/login");
        }
        
        $request_list = Certificate_request::where('resident_id','=',session("resident.id"))->get();


        return view('pages.ClientSide.userdashboard.schedule',compact('request_list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function printclient($schedule_id)
    {

        $brgy_official = brgy_official::where('position','!=','Punong Barangay')
        ->get();
        $approve = brgy_official::where('position','=','Punong Barangay')
        ->get();
        $puno = brgy_official::where('position','=','Punong Barangay')
        ->get();
        $layout = DB::table('certificate_layouts')
        ->where('layout_id','=','1')->first();
       $request_list =Certificate_request::find($schedule_id);

       $content = Certificate_list::Where('certificate_list_id','=',$request_list->cert_id)->first();
        $pdf = PDF::loadView('pages.AdminPanel.PDF.certificateclientpdf',compact('puno','brgy_official','content','approve','layout','request_list' ))->setPaper('A4','portrait')->setOptions(['defaultFont' => 'sans-serif','isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]) ;
    //   $path = public_path('pdf/');
     //  $fileName =  $content->certificate_list_id.'.'. 'pdf' ;
    //   $pdf->save($path . '/' . $fileName);
    //    $pdf = public_path('pdf/'.$fileName);

       // return view('pages.AdminPanel.PDF.certificatepdf',compact('puno','brgy_official','content','approve' ,'layout'));
    //   return response()->download($pdf);
     return $pdf->stream('certificate.pdf'); //test




    }


    public function show($id)
    {
        $brgy_official = brgy_official::where('position','!=','Punong Barangay')
        ->get();
        $approve = brgy_official::where('position','=','Punong Barangay')
        ->get();
        $puno = brgy_official::where('position','=','Punong Barangay')
        ->get();
        $layout = DB::table('certificate_layouts')
        ->where('layout_id','=','1')->first();
       $request_list =Certificate_request::find($id);

       $content = Certificate_list::Where('certificate_list_id','=',$request_list->cert_id)->first();
       return view('pages.ClientSide.userdashboard.certificateview',compact('puno','brgy_official','content','approve','layout','request_list' ));

    }
}
