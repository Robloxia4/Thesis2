<?php

namespace App\Http\Controllers\AdminPanel\Setting\Barangay;

use App\Http\Controllers\Controller;

use App\Models\Barangayimage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class BarangayimageController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'barangay_name' => 'Required',
            'city' => 'Required',
            'province' => 'Required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:300||dimensions:max_width=300,max_height=300',

        ]);






     //   $path = $request->file('image')->store('public/images');

     $path = $request->file('image')->store('public/images');


/*
         $image = Barangayimage::create([

            'city' => $request->city,
            'barangay_name' => $request->barangay_name,
            'province'=>$request->province,
            'image'=>basename($path),
            'url' => Storage::disk('s3')->url($path)

         ]);
*/


        $deletefile = DB::table('barangayimages')
        ->where('barangay_id','=',$request->barangay_id)
        ->first();
        if ($deletefile !== null) {
            $deletefile = DB::table('barangayimages')
        ->where('barangay_id','=',$request->barangay_id)
        ->first();

       Storage::delete($deletefile->image);

         }
         /** @var \Illuminate\Filesystem\FilesystemManager $disk */



        Barangayimage::updateOrCreate(['barangay_id' => $request->barangay_id],
        ['city' => $request->city,
        'barangay_name' => $request->barangay_name,
        'province'=>$request->province,
        'image'=>$path,


        ]);

        return redirect('/setting/maintenance')
                        ->with('success','Post has been created successfully.');
    }




public function test(){



    echo "231312";
}
}
