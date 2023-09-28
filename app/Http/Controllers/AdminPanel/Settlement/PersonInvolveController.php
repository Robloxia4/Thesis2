<?php

namespace App\Http\Controllers\AdminPanel\Settlement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//Models
use App\Models\blotters;
use App\Models\resident_info;
use App\Models\person_involve;
//Plugins
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class PersonInvolveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $resident = resident_info::latest()->get();

        if ($request->ajax()) {
            $data = resident_info::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('add_complainant', function ($row) {

                    $chk = '
                    <input type="checkbox" class="flat icheckbox_flat-green text-center addComplainant' . $row->resident_id . '" name="Complainant" hidden>
                    <input type="checkbox" data-id="' . $row->resident_id . '" class="flat icheckbox_flat-green text-center addComplainant addComplainantp' . $row->resident_id . '" name="ids[]" value="' . $row->resident_id . '">
                    <input type="checkbox" class="flat icheckbox_flat-green text-center addComplainant' . $row->resident_id . '" name="person_involve[]" value="' . $row->lastname . ", " . $row->firstname . " " . $row->middlename . '" hidden>
                    <input type="checkbox" class="flat icheckbox_flat-green text-center addComplainant' . $row->resident_id . '" name="involvement_type[]" value="Complainant" hidden>';
                    return $chk;
                })
                ->addColumn('add_respondent', function ($row) {

                    $chk = '
                    <input type="checkbox" class="flat icheckbox_flat-green text-center addRespondent' . $row->resident_id . '" name="Respondent" hidden>
                    <input type="checkbox" data-id="' . $row->resident_id . '" class="flat icheckbox_flat-green text-center addRespondent addRespondentp' . $row->resident_id . '" name="ids[]" value="' . $row->resident_id . '">
                    <input type="checkbox" class="flat icheckbox_flat-green text-center addRespondent' . $row->resident_id . '" name="person_involve[]" value="' . $row->lastname . ", " . $row->firstname . " " . $row->middlename . '" hidden>
                    <input type="checkbox" class="flat icheckbox_flat-green text-center addRespondent' . $row->resident_id . '" name="involvement_type[]" value="Respondent" hidden>';
                    return $chk;
                })
                ->addColumn('add_victim', function ($row) {

                    $chk = '
                    <input type="checkbox" class="flat icheckbox_flat-green text-center addVictim' . $row->resident_id . '" name="Victim" hidden>
                    <input type="checkbox" data-id="' . $row->resident_id . '" class="flat icheckbox_flat-green text-center addVictim addVictimp' . $row->resident_id . '" name="ids[]" value="' . $row->resident_id . '">
                    <input type="checkbox" class="flat icheckbox_flat-green text-center addVictim' . $row->resident_id . '" name="person_involve[]" value="' . $row->lastname . ", " . $row->firstname . " " . $row->middlename . '" hidden>
                    <input type="checkbox" class="flat icheckbox_flat-green text-center addVictim' . $row->resident_id . '" name="involvement_type[]" value="Victim" hidden>';
                    return $chk;
                })
                ->addColumn('add_attacker', function ($row) {
                    $chk = '
                    <input type="checkbox" class="flat icheckbox_flat-green text-center addAttacker' . $row->resident_id . '" name="Attacker" hidden>
                    <input type="checkbox" data-id="' . $row->resident_id . '" class="flat icheckbox_flat-green text-center addAttacker addAttackerp' . $row->resident_id . '" name="ids[]" value="' . $row->resident_id . '">
                    <input type="checkbox" class="flat icheckbox_flat-green text-center addAttacker' . $row->resident_id . '" name="person_involve[]" value="' . $row->lastname . ", " . $row->firstname . " " . $row->middlename . '" hidden>
                    <input type="checkbox" class="flat icheckbox_flat-green text-center addAttacker' . $row->resident_id . '" name="involvement_type[]" value="Attacker" hidden>';
                    return $chk;
                })
                ->addColumn('fullname', function ($fullname) {
                    return $fullname->lastname . ", " . $fullname->firstname . " " . $fullname->middlename;
                })
                ->rawColumns(['add_complainant', 'add_respondent', 'add_victim', 'add_attacker'])
                ->make(true);
        }

        return view('pages.AdminPanel.blotter',  compact('resident'));
    }




    public function edit($id)
    {
        $resident = resident_info::find($id);
        return response()->json($resident);
    }
}
