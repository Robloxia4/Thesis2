<?php

namespace App\Http\Controllers\ClientSide;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
//model
use App\Models\Certificate_list;
use App\Models\Certificate_request;
class ClearanceController extends Controller
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
        
        $certificate = Certificate_list::get();

        return view('pages.ClientSide.userdashboard.certificate',compact('certificate'));


    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required",

        ],
        [
            "name.required" => "Fill in the blank",

        ])->validate();

        $certificate = Certificate_list::where('certificate_type','=',$request->request_type)->first();

        $paid = 'No';
        Certificate_request::updateOrCreate(['request_id' => $request->request_id],['resident_id'=>$request->resident_id,
        'name'=>$request->name,
        'gender'=>$request->gender,
        'age'=>$request->age,
        'description'=>$request->Description,
        'request_type'=>$request->request_type,
        'paid'=>$paid,
        'price'=>$certificate->price,
        'cert_id'=> $certificate->certificate_list_id  ]);
           return redirect('/barangay/schedule')->with('success_certificate', 'Certificate successfully created!');

    }


}
