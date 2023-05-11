<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      User::create([
         'first_name' => 'Admin',
         'last_name' => 'Admin',
         'email' => 'admin@gmail.com',
         'password' => Hash::make('12345678'),
         'role' => '1'
     ]);
    }
}
