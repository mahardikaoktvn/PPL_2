<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AdminModel;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = new AdminModel;
        $user -> email = 'coba@coba.com';
        $user -> password = Hash::make('mahardika');
        $user -> nama = 'Admin';
        $user -> save();
    }
}
