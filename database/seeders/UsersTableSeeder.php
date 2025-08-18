<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', 'hosam@gmail.com')->first();

        if (!$user) {
            User::create([
                'name' => 'hosam',
                'email' => 'hosam@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'admin'
            ]);
        }
    }
}
