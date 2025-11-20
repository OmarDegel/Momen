<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Contact;
use App\Enums\ContactEnum;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        $types = ContactEnum::cases();

        foreach ($types as $type) {
            Contact::create([
                'user_id'    => null, 
                'name'       => fake()->name(),
                'email'      => fake()->safeEmail(),
                'phone'      => fake()->phoneNumber(),
                'title'      => ucfirst($type->value) . ' Message',
                'type'       => $type->value,
                'content'    => fake()->paragraph(),
                'attachment' => null, 
                'is_read'    => rand(0,1),
                'active'     => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
}
