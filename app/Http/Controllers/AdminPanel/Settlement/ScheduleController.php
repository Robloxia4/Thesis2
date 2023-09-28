<?php

namespace App\Http\Controllers\AdminPanel\Settlement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//Models
use App\Models\person_involve;
use App\Models\blotters;


//Plugins
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;

class ScheduleController extends Controller
{

    public function index(Request $request)
    {
        $blotters = blotters::latest()->get();

        if ($request->ajax()) {
            $schedule = blotters::where('schedule', '=', 'Schedule')
                ->where('schedule_date', '<>', '')
                ->get();

            return Datatables::of($schedule)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->blotter_id . '" data-original-title="Edit" class="edit btn btn-info  btn-xs pr-4 pl-4 editSchedule"><i class="fa fa-pencil fa-lg"></i> </a>';

                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->blotter_id . '" data-original-title="View" class="btn btn-primary btn-xs pr-4 pl-4 viewSchedule"><i class="fa fa-folder fa-lg"></i> </a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('pages.AdminPanel.schedule',  compact('blotters'));
    }

    public function create()
    {
        //
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

            blotters::updateOrCreate(
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
                    'schedule' => $request->schedule
                ]
            );

            return response()->json(['success' => 'NewBlotter saved successfully.']);
        }
    }


    // public function show(blotters $schedule)
    // {
    //     $person_involves = person_involve::all();

    //     $schedule = DB::table('blotters')
    //         ->where('schedule', '=', 'Schedule')
    //         ->where('schedule_date', '<>', '')
    //         ->get();
    //     $unschedule = DB::table('blotters')
    //         ->where('schedule', '=', 'Unschedule')
    //         ->whereNull('schedule_date')
    //         // ->orWhereNull('schedule_time')
    //         ->get();
    //     $today = DB::table('blotters')
    //         ->where('schedule', '=', 'Schedule')
    //         ->where('schedule_date', '=', Carbon::today()->toDateString())
    //         ->get();
    //     $settled = DB::table('blotters')
    //         ->where('schedule', '=', 'Settled')
    //         ->get();
    //     $scheduleCount = $schedule->count();
    //     $unscheduleCount = $unschedule->count();
    //     $todayCount = $today->count();
    //     $settledCount = $settled->count();
    //     $unsettledCount = $scheduleCount + $unscheduleCount;


    //     return view('pages.schedule', [
    //         'schedule' => $schedule,
    //         'unschedule' => $unschedule,
    //         'today' => $today,
    //         'settled' => $settled,
    //         'scheduleCount' => $scheduleCount,
    //         'unscheduleCount' => $unscheduleCount,
    //         'todayCount' => $todayCount,
    //         'settledCount' => $settledCount,
    //         'person_involves' => $person_involves,
    //         'unsettledCount' => $unsettledCount
    //     ]);
    // }


    public function edit($id)
    {

        $blotter = blotters::find($id);
        $person_involve = person_involve::where('blotter_id', $blotter->blotter_id)->get();


        return response()->json([$blotter, $person_involve]);
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
