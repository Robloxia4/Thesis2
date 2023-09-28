<?php

namespace App\Http\Controllers\ClientSide;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Models
use App\Models\resident_account;
use App\Models\resident_info;
use App\Models\area_setting;

//Plugins
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;
use Carbon\Carbon;

// Custom Rules
use App\Rules\ResidentConfirmPassword;
use App\Rules\ResidentEmailExists;

class ResidentAccountController extends Controller
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

        $resident_id =  session("resident.id") ;

        $area_setting = area_setting::all();
        $resident = resident_info::latest()->get();
        $resident_account = resident_account::where("resident_id","=", $resident_id)->first();


        return view('pages.ClientSide.userdashboard.accountsetting', [compact('resident'),'area_setting'=>$area_setting], compact('resident_account') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\resident_account  $resident_account
     * @return \Illuminate\Http\Response
     */
    public function show(resident_account $resident_account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\resident_account  $resident_account
     * @return \Illuminate\Http\Response
     */
    public function edit($resident_id)
    {
        $resident_info = resident_info::where("resident_id","=", $resident_id)->first();
        return response()->json($resident_info);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\resident_account  $resident_account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, resident_account $resident_account)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\resident_account  $resident_account
     * @return \Illuminate\Http\Response
     */
    public function destroy(resident_account $resident_account)
    {
        //
    }

    public function clientaccountsettingcheck(Request $request){
        $id = $request->resident_id;

        $validator = Validator::make($request->all(),[
            "resident_accountsetting_password" => ["required", new ResidentConfirmPassword($request->resident_email)],
            "resident_accountsetting_mobile" => "digits:11|nullable",
            "resident_accountsetting_telephone" => "digits:8|nullable",
            "resident_accountsetting_PAG_IBIG" => "digits:14|nullable",
            "resident_accountsetting_PHILHEALTH" => "digits:14|nullable",
            "resident_accountsetting_SSS" => "digits:10|nullable",
            "resident_accountsetting_TIN" => "digits:12|nullable",
            "resident_accountsetting_email" => ["nullable", "ends_with:@gmail.com,@yahoo.com", "unique:resident_accounts,email,$id,resident_id"],
            "resident_accountsetting_newpassword" => "confirmed|sometimes",
            "resident_accountsetting_newpassword_confirmation" => "required|sometimes",
        ],
        [
            "resident_accountsetting_password.required" => "Please enter your password to save changes",
            "resident_accountsetting_mobile.digits" => "Please enter a valid mobile number.",
            "resident_accountsetting_telephone.digits" => "Please enter a valid telephone number.",
            "resident_accountsetting_PAG_IBIG.digits" => "Please enter a valid format.",
            "resident_accountsetting_PHILHEALTH.digits" => "Please enter a valid format.",
            "resident_accountsetting_SSS.digits" => "Please enter a valid format.",
            "resident_accountsetting_TIN.digits" => "Please enter a valid format.",
            "resident_accountsetting_email.ends_with" => "Please enter a valid email.",
            "resident_accountsetting_newpassword.confirmed" => "Does not match with confirm password.",
            "resident_accountsetting_newpassword_confirmation.required" => "Enter again here your new password."
        ]);

        if ($validator->fails()) {
            return response()->json(['status'=> 0, 'error'=>$validator->errors()->toArray()]);
        }
        else {

            if ($request->resident_accountsetting_email == null) {
                $new_email = $request->resident_email;
            }
            else {
                $new_email = $request->resident_accountsetting_email;
            }

            session(['resident.firstname' => $request->resident_accountsetting_firstname]);
            session(['resident.email' => $new_email]);
            session(['resident.username' => $request->resident_accountsetting_username]);

            // Saving at resident account
            $values1 = [
                'last_name' => $request->resident_accountsetting_lastname,
                'first_name' => $request->resident_accountsetting_firstname,
                'email'=>$new_email,
                'username'=>$request->resident_accountsetting_username,
            ];


            if ($request->resident_accountsetting_newpassword != "") {
                $password = (['password'=>Hash::make($request->resident_accountsetting_newpassword)]);
                $values1 += $password;
            }

            $query = DB::table('resident_accounts')->where("resident_id","=", $id)->update($values1);

            // Saving at resident info
            $values2 = [
                'lastname' => $request->resident_accountsetting_lastname,
                'firstname' => $request->resident_accountsetting_firstname,
                'middlename'=> $request->resident_accountsetting_middlename,
                'alias' =>$request->resident_accountsetting_alias,
                'birthday'=>$request->resident_accountsetting_birthday,
                'age'=>$request->resident_accountsetting_age,
                'gender'=>$request->resident_accountsetting_gender,
                'civilstatus'=>$request->resident_accountsetting_civilstatus,
                'voterstatus'=>$request->resident_accountsetting_voterstatus,
                'birth_of_place'=>$request->resident_accountsetting_birthplace,
                'citizenship'=>$request->resident_accountsetting_citizenship,
                'telephone_no'=>$request->resident_accountsetting_telephone,
                'mobile_no'=>$request->resident_accountsetting_mobile,
                'height'=>$request->resident_accountsetting_height,
                'weight'=>$request->resident_accountsetting_weight,
                'PAG_IBIG'=>$request->resident_accountsetting_PAG_IBIG,
                'PHILHEALTH'=>$request->resident_accountsetting_PHILHEALTH,
                'SSS'=>$request->resident_accountsetting_SSS,
                'TIN'=>$request->resident_accountsetting_TIN,
                'email'=>$new_email,
                'spouse'=>$request->resident_accountsetting_spouse,
                'father'=>$request->resident_accountsetting_father,
                'mother'=>$request->resident_accountsetting_mother,
                'area'=>$request->resident_accountsetting_area,
                'address_1'=>$request->resident_accountsetting_address_1,
                'address_2'=>$request->resident_accountsetting_address_2
            ];

            $query = DB::table('resident_infos')->where("resident_id","=", $id)->update($values2);

            return response()->json(['msg'=>'Account information has been changed successfully.','firstname'=>$request->resident_accountsetting_firstname]);

        }
    }
}
