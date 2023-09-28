<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
//Models
use App\Models\resident_info;
use App\Models\area_setting;
use Illuminate\Http\Request;

//Plugins
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use Carbon\Carbon;
use PDF;
class ResidentInfoController extends Controller
{

    public function index(Request $request)
    {
        if (!session()->has("user")) {
            return redirect("login");
        }
        
        $area_setting = area_setting::all();

        $resident = resident_info::latest()->get();
        if ($request->ajax()) {
            $data = resident_info::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('checkbox', function($row){
                        $chk = '
                             <input type="checkbox" class="flat icheckbox_flat-green text-center checkBoxClass" id="checked"  name="ids" data-id="'.$row->resident_id.'" name="table_records">';
                        return $chk;
                    })
                    ->addColumn('action', function($row){
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->resident_id.'" data-original-title="Edit" class="edit btn btn-info  btn-xs pr-4 pl-4 editResident"><i class="fa fa-pencil fa-lg"></i> </a>';
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"   data-id="'.$row->resident_id.'" data-original-title="Delete" class="btn btn-danger btn-xs pr-4 pl-4 deleteresident"><i class="fa fa-trash fa-lg"></i> </a>';
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->resident_id.'" data-original-title="View" class="btn btn-primary btn-xs pr-4 pl-4 viewresident"><i class="fa fa-folder fa-lg"></i> </a>';
                         return $btn;
                 })
                   ->rawColumns(['checkbox','action'])
                    ->make(true);





        }

        return view('pages.AdminPanel.resident',[compact('resident'),'area_setting'=>$area_setting]);
    }
    public function store(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'lastname' => 'required',
            'firstname' => 'required',
            'middlename' => 'required',
            'alias' => 'required',
            'birthday' => 'required',
            'age'  => 'required',
            'gender' => 'required',
            'civilstatus'  => 'required',
            'voterstatus'  => 'required',
            'birthplace'  => 'required',
            'citizenship'  => 'required',
            'telephone'  => 'required',
            'mobile'  => 'required',
             'height'  => 'required',
             'weight'  => 'required',
            'PAG_IBIG'  => 'required',
            'PHILHEALTH'  => 'required',
            'SSS' => 'required',
            'TIN' => 'required',
            'email' =>   "required|ends_with:@gmail.com,@yahoo.com|unique:accounts,email",
            'spouse' => 'required',
            'father' => 'required',
            'mother' => 'required',
            'area' => 'required',
            'address_1' => 'required',
            'address_2' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json(['status'=>0,'error'=>$validator->errors()]);
        }else{


        resident_info::updateOrCreate(['resident_id' => $request->resident_id],
        ['lastname' => $request->lastname,
        'firstname' => $request->firstname,
        'middlename'=> $request->middlename,
        'alias' =>$request->alias,
        'birthday'=>$request->birthday,
        'age'=>$request->age,
        'gender'=>$request->gender,
        'civilstatus'=>$request->civilstatus,
        'voterstatus'=>$request->voterstatus,
        'birth_of_place'=>$request->birthplace,
        'citizenship'=>$request->citizenship,
        'telephone_no'=>$request->telephone,
        'mobile_no'=>$request->mobile,
        'height'=>$request->height,
        'weight'=>$request->weight,
        'PAG_IBIG'=>$request->PAG_IBIG,
        'PHILHEALTH'=>$request->PHILHEALTH,
        'SSS'=>$request->SSS,
        'TIN'=>$request->TIN,
        'email'=>$request->email,
        'spouse'=>$request->spouse,
        'father'=>$request->father,
        'mother'=>$request->mother,
        'area'=>$request->area,
        'address_1'=>$request->address_1,
        'address_2'=>$request->address_2]);
        $data = DB::table('area_settings')
        ->select('area')->get();

        if(count($data))
         foreach ($data as $data) {

             $test = DB::table('resident_infos')
             ->where('area','=',$data->area)->count();

             area_setting::where('area', '=', $data->area)
            ->update(['population' => $test]);




         }




        return response()->json(['status'=>1,'success'=>'resident saved successfully.']);
        }

    }

    public function person($resident_id)
    {
        $person_involve = DB::table('person_involves')
        ->where('resident_id','=',$resident_id)
        ->get();
       return response()->json($person_involve);
    }
    public function blotter($resident_id,Request $request){
        if($request->ajax()){
            $data = DB::table('person_involves')
            ->select('blotters.incident_type','blotters.status','blotters.date_reported','blotters.date_incident','blotters.incident_location','blotters.blotter_id')
            ->join('blotters','blotters.blotter_id','=','person_involves.blotter_id')
            ->where('person_involves.resident_id','=',$resident_id)
            ->get();
            return(Datatables::of($data)
            ->editColumn('date_reported', function ($blotter) {
                return $blotter->date_reported ? with(new Carbon($blotter->date_reported))->format('m/d/Y') : '';
            })
            ->editColumn('date_incident', function ($blotter) {
                return $blotter->date_incident ? with(new Carbon($blotter->date_incident))->format('m/d/Y') : '';
            })
            ->make(true));
        }
}
    public function edit($id)
    {
        $resident_info = resident_info::find($id);
        return response()->json($resident_info);
    }
    public function destroy($id)
    {
        resident_info::find($id)->delete();

        $data = DB::table('area_settings')
       ->select('area')->get();

       if(count($data))
        foreach ($data as $data) {

            $test = DB::table('resident_infos')
            ->where('area','=',$data->area)->count();

            area_setting::where('area', '=', $data->area)
           ->update(['population' => $test]);

        }
        return response()->json(['success'=>'Resident deleted successfully.']);
    }

}
