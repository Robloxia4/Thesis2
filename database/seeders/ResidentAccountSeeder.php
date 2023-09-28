<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Hash;
use DB;

class ResidentAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('resident_accounts')->insert([
            'resident_id'=> 1,
            'first_name'=>'giann',
            'last_name'=>'giann',
            'username'=>'giann',
            'email'=>'giann@gmail.com',
            'password'=>Hash::make('giann'),
        ]);

        DB::table('resident_accounts')->insert([
            'resident_id'=> 2,
            'first_name'=>'rojhon',
            'last_name'=>'rojhon',
            'username'=>'rojhon',
            'email'=>'rojhon@gmail.com',
            'password'=>Hash::make('rojhon'),
        ]);

        DB::table('resident_accounts')->insert([
            'resident_id'=> 3,
            'first_name'=>'von',
            'last_name'=>'von',
            'username'=>'von',
            'email'=>'von@gmail.com',
            'password'=>Hash::make('von'),
        ]);

        DB::table('resident_accounts')->insert([
            'resident_id'=> 4,
            'first_name'=>'salen',
            'last_name'=>'salen',
            'username'=>'salen',
            'email'=>'salen@gmail.com',
            'password'=>Hash::make('salen'),
        ]);

        DB::table('resident_accounts')->insert([
            'resident_id'=> 5,
            'first_name'=>'test',
            'last_name'=>'test',
            'username'=>'test',
            'email'=>'test@gmail.com',
            'password'=>Hash::make('test'),
        ]);
    }
}
