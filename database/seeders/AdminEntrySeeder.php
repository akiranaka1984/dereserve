<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class AdminEntrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'firstname' => 'Admin',
            'lastname' => 'Admin',
            'username' => 'Admin',
            'email' => 'admin@admin.com',
            'email_verify_status' => 1,
            'password' => bcrypt('123456'),
            'city'=>'jp',
            'role'=>'admin'
        ]);
    }
}
