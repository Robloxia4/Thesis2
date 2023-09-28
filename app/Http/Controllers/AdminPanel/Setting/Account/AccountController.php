<?php

namespace App\Http\Controllers\AdminPanel\Setting\Account;

use App\Http\Controllers\Controller;
//Models
use App\Models\Account;
use App\Models\resident_account;
use App\Models\Sessions;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use app\Rules\emailValidate;

//Add ons
use Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\ValidatesRequests;

// Custom Rules
use App\Rules\ConfirmPassword;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!session()->has("user")) {
            return redirect("login");
        }
        
        $accounts = Account::latest()->get();

        $sessions = DB::table('sessions')
                        ->orderBy('session_id', 'desc')
                        ->get();



        if ($request->ajax()) {
            $data = Account::latest()->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-username="'.$row->username.'" data-id="'.$row->account_id.'" data-original-title="Edit" class="edit btn btn-primary btn-xs pr-4 pl-4" id="selectBtn"></i><i class="fa fa-pencil" aria-hidden="true"></i> </a>';

                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->account_id.'" data-original-title="Delete" class="btn btn-danger btn-xs pr-4 pl-4" id="deleteBtn"><i class="fa fa-trash" aria-hidden="true"></a>';

                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('pages.AdminPanel.setting.account',compact('accounts','sessions'));
    }

    public function getSessionTable(Request $request){

        if ($request->ajax()) {
            $data = DB::table('sessions')
            ->select("session_id","user_id","username","login_at")
            ->get();
            return Datatables::of($data)
            ->make(true);
        }
        
    }

    public function getResidentAccountTable(Request $request){

        if ($request->ajax()) {
            $data = resident_account::latest()->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-username="'.$row->username.'" data-id="'.$row->resident_account_id.'" data-original-title="Edit" class="edit btn btn-primary btn-xs pr-4 pl-4" id="residentSelectBtn"></i><i class="fa fa-pencil" aria-hidden="true"></i> </a>';

                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->resident_account_id.'" data-original-title="Delete" class="btn btn-danger btn-xs pr-4 pl-4" id="residentDeleteBtn"><i class="fa fa-trash" aria-hidden="true"></a>';

                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
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

         $validator = Validator::make($request->all(),[
             "create_account_form_firstname"=>"required",
             "create_account_form_lastname"=>"required",
             "create_account_form_username"=>"required|unique:accounts,username",
             "create_account_form_email"=> "required|ends_with:@gmail.com,@yahoo.com|unique:accounts,email",
             "create_account_form_password"=>"required|same:create_account_form_verify_password",
             "create_account_form_verify_password"=>"required|same:create_account_form_password"
         ],
         [
             "create_account_form_firstname.required" => "This field cannot be empty",
             "create_account_form_lastname.required" => "This field cannot be empty",
             "create_account_form_username.required" => "This field cannot be empty",
             "create_account_form_email.required" => "This field cannot be empty",
             "create_account_form_password.required" => "This field cannot be empty",
             "create_account_form_verify_password.required" => "This field cannot be empty",

             "create_account_form_email.ends_with" => "Valid email is required",

             "create_account_form_password.same" => "Password does not match",
             "create_account_form_verify_password.same" => "Password does not match",

             "create_account_form_username.unique" => "Username Taken!",
             "create_account_form_email.unique" => "Email Taken!",


         ]);


         if ($validator->fails()) {
             return response()->json(['status'=> 0, 'error'=>$validator->errors()->toArray()]);
         }
         else {
             $values = [
                 'first_name'=>$request->create_account_form_firstname,
                  'last_name'=>$request->create_account_form_lastname,
                  'username'=>$request->create_account_form_username,
                  'email'=>$request->create_account_form_email,
                  'password'=>Hash::make($request->create_account_form_password),
                  'type'=> $request->create_account_form_type,
             ];

             $query = DB::table('accounts')->insert($values);

             if($query) {
                 return response()->json(['status'=>1, 'msg'=> 'Added new account :)']);
             }
         }
     }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account,Sessions $session)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $account = Account::find($id);
        return response()->json($account);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
     public function update($id, Request $request)
     {
         $accounts = Account::findorfail($id);

        //  $request->request->add(['old_database_password' => $accounts->password]);

         $validator2 = Validator::make($request->all(),[
             "manage_account_username" => "required",
             "manage_account_new_password" => "required|same:manage_account_confirm_password",
             "manage_account_confirm_password" => "required|same:manage_account_new_password",
         ],
         [
             "manage_account_username.required" => "Username cannot be empty",
             "manage_account_new_password.required" => "New Password cannot be empty",
             "manage_account_confirm_password.required" => "Please verify your password",
             "manage_account_new_password.same" => "Password does not match",
             "manage_account_confirm_password.same" => "password does not match",
         ]);

         if ($validator2->fails()) {
             return response()->json(['status'=> 0, 'error'=>$validator2->errors()->toArray()]);
         }
         else {

             $accounts -> password = Hash::make($request->manage_account_new_password);
             $accounts->save();

             return response()->json(['status'=>1, 'msg'=> 'Password has been changed']);

         }
     }

     public function resident_update($id, Request $request)
     {
         $resident_account = resident_account::findorfail($id);

         $validator = Validator::make($request->all(),[
             "manage_resident_account_username" => "required",
             "manage_resident_account_new_password" => "required|same:manage_resident_account_confirm_password",
             "manage_resident_account_confirm_password" => "required|same:manage_resident_account_new_password",
         ],
         [
             "manage_resident_account_username.required" => "Username cannot be empty",
             "manage_resident_account_new_password.required" => "New Password cannot be empty",
             "manage_resident_account_confirm_password.required" => "Please verify your password",
             "manage_resident_account_new_password.same" => "Password does not match",
             "manage_resident_account_confirm_password.same" => "password does not match",
         ]);

         if ($validator->fails()) {
             return response()->json(['status'=> 0, 'error'=>$validator->errors()->toArray()]);
         }
         else {

             $resident_account -> password = Hash::make($request->manage_resident_account_new_password);
             $resident_account->save();

             return response()->json(['status'=>1, 'msg'=> 'Password has been changed']);

         }
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Responses
     */
    public function destroy($id)
    {
        $sessions = DB::table('sessions')->where('user_id', '=', $id)->delete();
        Account::find($id)->delete();

        return response()->json(['success'=>'Account deleted successfully.']);
    }

    public function resident_delete($id)
    {
        resident_account::find($id)->delete();

        return response()->json(['success'=>'Account deleted successfully.']);
    }

    public function accountSettingCheck(Request $request){
        $id = $request->current_id;
        $accounts = Account::findorfail($id);

        $validator = Validator::make($request->all(),[
            "new_input_modal" => ["required","sometimes"],
            "new_input_username_modal" => ["required", "unique:accounts,username","sometimes"],
            "new_input_email_modal" => ["required", "ends_with:@gmail.com,@yahoo.com", "sometimes"],
            "current_password_modal_confirmation" => ["required", "same:new_input_modal", "sometimes"],
            "current_password_modal" => ["required", "sometimes", new ConfirmPassword($accounts->email)],

        ],
        [
            "new_input_modal.required" => "This cannot be empty.",
            "new_input_email_modal.required" => "This cannot be empty.",
            "new_input_email_modal.ends_with" => "We need a valid email!!",
            "current_password_modal.required" => "Please enter your password!!",
            "new_input_username_modal.unique" => "Username taken.",
            "current_password_modal_confirmation.required" => "Verify your new password!!",
            "current_password_modal_confirmation.same" => "Does not match with new password"

        ]);

        if ($validator->fails()) {
            return response()->json(['status'=> 0, 'error'=>$validator->errors()->toArray()]);
        }
        else {

            if ($request->table_edit == "firstname") {
                $accounts -> first_name = $request->new_input_modal;
                $accounts->save();

                session(['user.firstname' => $request->new_input_modal]);
            }

            if ($request->table_edit == "lastname") {
                $accounts -> last_name = $request->new_input_modal;
                $accounts->save();
            }

            if ($request->table_edit == "username") {

                $test = DB::table('sessions')
                ->where('user_id', '=', $id)
                ->update(['username' => $request->new_input_username_modal]);

                $accounts -> username = $request->new_input_username_modal;
                $accounts->save();

            }

            if ($request->table_edit == "email") {
                $accounts -> email = $request->new_input_email_modal;

                $accounts->save();
            }

            if ($request->table_edit == "password") {
                $accounts -> password = Hash::make($request->new_input_modal);
                $accounts->save();
            }

            return response()->json(['msg'=>'Account information has been changed successfully.']);

        }
    }
}
