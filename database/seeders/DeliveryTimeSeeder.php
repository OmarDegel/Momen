<?php

namespace Database\Seeders;

use App\Helpers\HourHelper;
use App\Models\DeliveryTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class DeliveryTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run(): void
    {
        $faker = Faker::create();

        $timeSlots = array_values(HourHelper::fullDayRange());

        for ($i = 0; $i < 10; $i++) {
            $start = $faker->randomElement($timeSlots);
            $end = $faker->randomElement($timeSlots);

            if (strtotime($end) <= strtotime($start)) {
                $end = $start;
            }

            DeliveryTime::create([
                'name' => [
                    'en' => $faker->word(),
                    'ar' => $faker->word(),
                ],
                'hour_start' => $start,
                'hour_end'   => $end,
                'active'     => rand(0, 1),
                'order_id'      => $i,
                'type'       => $faker->randomElement(deliveryTimeType()),
            ]);
        }
    }
}
