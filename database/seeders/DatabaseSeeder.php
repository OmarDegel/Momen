<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();


        $this->call(LaratrustSeeder::class);
        $user = User::create([
            'first_name' => 'omar',
            'last_name' => 'samy',
            'email' => 'osamy8088@gmail.com',
            'password' => '12345678',
            'phone' => '01019631989',
            'lang' => 'en',
            'theme' => 'light',
            'type' => 'admin'
        ]);
        $user->addRole('super_admin');
    }
}
