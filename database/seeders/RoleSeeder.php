<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // check if table users is empty
       if(DB::table('roles')->count() == 0){

           DB::table('roles')->insert([

               [
                   'role' => 'admin',
                   'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                   'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
               ],
               [
                   'role' => 'hr',
                   'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                   'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
               ],
               [
                   'role' => 'investigator',
                   'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                   'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
               ]

           ]);

       } else { echo "\RoleTable is not empty, therefore NOT "; }
    }

}
