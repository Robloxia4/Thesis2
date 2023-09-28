<?php

namespace App\Http\Controllers\AdminPanel\Settlement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//Plugins
use Yajra\DataTables\DataTables;
//Models
use App\Models\blotters;

class SettledCasesController extends Controller
{
    public function index(Request $request)
    {
        $blotters = blotters::latest()->get();

        if ($request->ajax()) {
            $settled = blotters::where('schedule', '=', 'Settled')
                ->get();

            return Datatables::of($settled)
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
}
