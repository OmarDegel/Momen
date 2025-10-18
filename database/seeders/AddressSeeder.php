<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{

    public function run(): void
    {
        $users = User::all();
        foreach ($users as $user) {
            $user->addresses()->create([
                'type' => 'home',
                'city_id' => City::all()->random()->id,
                'latitude' => fake()->latitude(),
                'longitude' => fake()->longitude(),
                'address' => fake()->address(),
                'phone' => fake()->phoneNumber(),
                'active' => 1
            ]);
        }
    }
}
