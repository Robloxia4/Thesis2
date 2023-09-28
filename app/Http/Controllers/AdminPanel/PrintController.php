<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;

//Models
use App\Models\brgy_official;
use App\Models\Certificate_layout;
use App\Models\Certificate_list;
use App\Models\Certificate_request;
//Illuminate
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

class PrintController extends Controller
{

    public function index(Request $request)
    {
        $brgy_official = brgy_official::where('position','!=','Punong Barangay')
        ->get();
        $approve = brgy_official::where('position','=','Punong Barangay')
        ->get();
        $puno = brgy_official::where('position','=','Punong Barangay')
        ->get();
      //  $content = Certificate_list::Where('certificate_list_id','=',$request->print_id)->first();
      $content = Certificate_list::Where('certificate_list_id','=',1)->first();
        $certrequest = Certificate_request::latest();

       return view('pages.AdminPanel.PDF.certificatepdf',compact('puno','brgy_official','content','approve' ));
    }

    public function Print(Request $request)
    {

        $brgy_official = brgy_official::where('position','!=','Punong Barangay')
        ->get();
        $approve = brgy_official::where('position','=','Punong Barangay')
        ->get();
        $puno = brgy_official::where('position','=','Punong Barangay')
        ->get();
        $layout = DB::table('certificate_layouts')
        ->where('layout_id','=','1')->first();
       $content = Certificate_list::Where('certificate_list_id','=',$request->print_id)->first();
    //  $content = Certificate_list::Where('certificate_list_id','=',1)->first();
        $certrequest = Certificate_request::latest()
        ->where('paid','=','No')
        ->get();
        $pdf = PDF::loadView('pages.AdminPanel.PDF.certificatepdf',compact('puno','brgy_official','content','approve','layout' ))->setPaper('A4','portrait')->setOptions(['defaultFont' => 'sans-serif','isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]) ;
        $path = public_path('pdf/');
       $fileName =  $content->certificate_list_id.'.'. 'pdf' ;
       $pdf->save($path . '/' . $fileName);
        $pdf = public_path('pdf/'.$fileName);

       // return view('pages.AdminPanel.PDF.certificatepdf',compact('puno','brgy_official','content','approve' ,'layout'));
       return response()->download($pdf);
     // return $pdf->stream('certificate.pdf'); //test




    }
}



