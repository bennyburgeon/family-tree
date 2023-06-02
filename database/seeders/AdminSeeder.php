<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;
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
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'mobile' => 9999999999,
            'is_admin' => 1,
            'password' => app('hash')->make('123@123'),
            'verified_at' =>Carbon::now()
        ]);
        User::create([
            'name' => 'branch One',
            'email' => 'branch@gmail.com',
            'mobile' => 8888888888,
            'password' => app('hash')->make('123@123'),
            'verified_at' =>Carbon::now()
        ]);
    }
}
