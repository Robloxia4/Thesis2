<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;

//Models
use App\Models\brgy_official;
use App\Models\area_setting;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function dashboard()
    {
        if (!session()->has("user")) {
            return redirect("login");
        }
        
        $brgy_official = brgy_official::all();
        $area_setting = area_setting::all();
        $registered = DB::table('resident_infos')->count();
        $certificate_requests = DB::table('certificate_requests')->count();
        $male = DB::table('resident_infos')
            ->where('gender','=','Male')->count();
        $female = DB::table('resident_infos')
            ->where('gender','=','Female')->count();
        $voter = DB::table('resident_infos')
            ->where('voterstatus','=','Yes')->count();

        return view('pages.AdminPanel.dashboard',['brgy_official'=>$brgy_official,'area_setting'=>$area_setting,
        'male'=>$male,'female'=>$female,'voter'=>$voter,'registered'=>$registered,'certificate_requests'=>$certificate_requests]);
    }
}



