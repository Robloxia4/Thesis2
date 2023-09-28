<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Hash;
use DB;

class ResidentInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('resident_infos')->insert([
            'firstname'=>'giann',
            'lastname'=>'giann',
            'email'=>'giann@gmail.com',
        ]);

        DB::table('resident_infos')->insert([
            'firstname'=>'rojhon',
            'lastname'=>'rojhon',
            'email'=>'rojhon@gmail.com',
        ]);

        DB::table('resident_infos')->insert([
            'firstname'=>'von',
            'lastname'=>'von',
            'email'=>'von@gmail.com',
        ]);

        DB::table('resident_infos')->insert([
            'firstname'=>'salen',
            'lastname'=>'salen',
            'email'=>'salen@gmail.com',
        ]);

        DB::table('resident_infos')->insert([
            'firstname'=>'test',
            'lastname'=>'test',
            'email'=>'test@gmail.com',
        ]);
    }
}
