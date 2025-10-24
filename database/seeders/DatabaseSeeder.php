<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Order;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\OrderSeeder;
use Database\Seeders\CouponSeeder;
use Database\Seeders\ReasonSeeder;
use Database\Seeders\RegionSeeder;
use Database\Seeders\PaymentSeeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\SettingSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();



        $this->call(
            [
                LaratrustSeeder::class,
                CategorySeeder::class,
                SizeSeeder::class,
                CurrencySeeder::class,
                CountrySeeder::class,
                CitySeeder::class,
                RegionSeeder::class,
                ContactSeeder::class,
                ColorSeeder::class,
                BrandSeeder::class,
                ProductSeeder::class,
                SettingSeeder::class,
                CouponSeeder::class,
                DeliveryTimeSeeder::class,

            ]
        );
        $user = User::create([
            'name_first' => 'omar',
            'name_last' => 'samy',
            'email' => 'osamy8088@gmail.com',
            'password' => '12345678',
            'phone' => '01019631989',
            'locale' => 'en',
            'theme' => 'light',
            'type' => 'admin'
        ]);
        $user->addRole('super_admin');
        $this->call([
            AddressSeeder::class,
            PaymentSeeder::class,
            ReasonSeeder::class,
            OrderRejectSeeder::class,

            OrderSeeder::class,
            OrderItemReturnSeeder::class,
        ]);
    }
}
