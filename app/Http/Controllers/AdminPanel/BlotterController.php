<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//Models
use App\Models\blotters;
use App\Models\resident_info;
use App\Models\person_involve;
//Plugins
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Foreach_;
use Illuminate\Support\Facades\Validator;

class BlotterController extends Controller
{

    public function index(Request $request)
    {
        $blotters = blotters::latest()->get();

        if ($request->ajax()) {
            $data = blotters::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->blotter_id . '" data-original-title="Edit" class="edit btn btn-info  btn-xs pr-4 pl-4 editBlotter"><i class="fa fa-pencil fa-lg"></i> </a>';

                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"   data-id="' . $row->blotter_id . '" data-original-title="Delete" class="btn btn-danger btn-xs pr-4 pl-4 deleteBlotter"><i class="fa fa-trash fa-lg"></i> </a>';
                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->blotter_id . '" data-original-title="View" class="btn btn-primary btn-xs pr-4 pl-4 viewBlotter"><i class="fa fa-folder fa-lg"></i> </a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('pages.AdminPanel.blotter',  compact('blotters'));
    }


    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                "incident_location" => "required",
                "incident_type" => "required",
                "date_incident" => "required",
                "time_incident" => "required",
                "date_reported" => "required",
                "time_reported" => "required",
                "status" => "required",
                "incident_narrative" => "required",
                "Complainant" => "required",
                "Respondent" => "required",
                "Victim" => "required",
                "Attacker" => "required"
            ]

        );

        if ($validator->fails()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {

            // if ($request->schedule_date != null && $request->schedule_time != null) {
            //     $request->schedule = "Schedule";
            // } else {
            //     $request->schedule = "Unschedule";
            // }

            if ($request->schedule_date != null) {
                $request->schedule = "Schedule";
            } else {
                $request->schedule = "Unschedule";
            }

            if ($request->status == "Settled") {
                $request->schedule = "Settled";
            }

            $blotters = blotters::updateOrCreate(
                ['blotter_id' => $request->blotter_id],
                [
                    'incident_location' => $request->incident_location,
                    'incident_type' => $request->incident_type,
                    'date_incident' => $request->date_incident,
                    'time_incident' => $request->time_incident,
                    'date_reported' => $request->date_reported,
                    'time_reported' => $request->time_reported,
                    'status' => $request->status,
                    'schedule_date' => $request->schedule_date,
                    // 'schedule_time' => $request->schedule_time,
                    'schedule' => $request->schedule,
                    'incident_narrative' => $request->incident_narrative
                ]
            );

            $blotter_id = $blotters->blotter_id;
            DB::table('person_involves')->where('blotter_id',  $blotter_id)->delete();

            foreach ($request->ids as $key => $ids) {
                $data = new person_involve();
                $data->blotter_id = $blotter_id;
                $data->resident_id = $ids;
                $data->person_involve = $request->person_involve[$key];
                $data->involvement_type = $request->involvement_type[$key];
                $data->save();
            }



            return response()->json(['success' => 'NewBlotter saved successfully.']);
        }
    }


    public function show(blotters $blotter)
    {
        if (!session()->has("user")) {
            return redirect("login");
        }
        
        $resident = resident_info::all();
        $blotter = blotters::all();
        return view('pages.AdminPanel.blotter', ['blotter' => $blotter,  'resident' => $resident]);
    }


    public function edit($id)
    {

        $blotter = blotters::find($id);
        $person_involve = person_involve::where('blotter_id', $blotter->blotter_id)->get();

        return response()->json([$blotter, $person_involve]);
    }






    public function destroy($id)
    {
        blotters::find($id)->delete();

        return response()->json(['success' => 'Blotter deleted successfully.']);
    }
}
