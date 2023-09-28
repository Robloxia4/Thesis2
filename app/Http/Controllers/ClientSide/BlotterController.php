<?php

namespace App\Http\Controllers\ClientSide;

use App\Http\Controllers\Controller;

use App\Models\blotters;
use App\Models\person_involve;
use App\Models\resident_account;
use App\Models\resident_info;
use App\Models\Certificate_layout;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;

class BlotterController extends Controller
{

    public function index($residentid)
    {
        $data = DB::table('person_involves')
            ->where('person_involves.resident_id',  $residentid)
            ->join('blotters', 'blotters.blotter_id', '=', 'person_involves.blotter_id')
            ->select('blotters.blotter_id', 'blotters.incident_location', 'blotters.incident_type', 'blotters.status', 'blotters.date_reported', 'blotters.incident_narrative')
            ->get();
        return view('pages.ClientSide.userdashboard.blotter', [
            "data" => $data
        ]);
    }
    public function edit($id)
    {

        $blotter = blotters::find($id);
        $person_involve = person_involve::where('blotter_id', $blotter->blotter_id)->get();

        return response()->json([$blotter, $person_involve]);
    }

    public function pdf($resident_id, $blotterid)
    {

        $data = DB::table('person_involves')
            ->where('person_involves.resident_id',  $resident_id)
            ->where('person_involves.blotter_id', $blotterid)
            ->join('blotters', 'blotters.blotter_id', '=', 'person_involves.blotter_id')
            ->select('blotters.blotter_id', 'blotters.incident_type', 'blotters.status', 'blotters.date_incident', 'blotters.time_incident', 'blotters.date_reported', 'blotters.time_reported', 'blotters.incident_location', 'blotters.incident_narrative')
            ->get();

        $blotter = blotters::find($blotterid);

        $complainant = person_involve::where('blotter_id', $blotter->blotter_id)
            ->where('involvement_type', "Complainant")->get();

        $respondent = person_involve::where('blotter_id', $blotter->blotter_id)
            ->where('involvement_type', "Respondent")->get();

        $victim = person_involve::where('blotter_id', $blotter->blotter_id)
            ->where('involvement_type', "Victim")->get();

        $attacker = person_involve::where('blotter_id', $blotter->blotter_id)
            ->where('involvement_type', "Attacker")->get();

        $certificate_layout = Certificate_layout::all();


        // return view(
        //     'pages.ClientSide.userdashboard.blotterpdfformat.blotter',
        //     [
        //         "data" => $data,
        //         "complainant" => $complainant,
        //         "respondent" => $respondent,
        //         "victim" => $victim,
        //         "attacker" => $attacker,
        //         "certificate_layout" => $certificate_layout
        //     ]
        // );
        $pdf = PDF::loadView(
            'pages.ClientSide.userdashboard.blotterpdfformat.blotter',
            [
                "data" => $data,
                "complainant" => $complainant,
                "respondent" => $respondent,
                "victim" => $victim,
                "attacker" => $attacker,
                "certificate_layout" => $certificate_layout
            ]
        );
        return $pdf->download('blotter.pdf');
    }
}
