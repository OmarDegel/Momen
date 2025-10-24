<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colors = [
            ['en' => 'Red',    'ar' => 'أحمر' ],
            ['en' => 'Blue',   'ar' => 'أزرق' ],
            ['en' => 'Green',  'ar' => 'أخضر' ],
            ['en' => 'Black',  'ar' => 'أسود' ],
            ['en' => 'White',  'ar' => 'أبيض' ],
            ['en' => 'Yellow', 'ar' => 'أصفر' ],
            ['en' => 'Gray',   'ar' => 'رمادي'],
            ['en' => 'Orange', 'ar' => 'برتقالي'],
            ['en' => 'Purple', 'ar' => 'بنفسجي'],
            ['en' => 'Brown',  'ar' => 'بني'  ],
        ];

        foreach ($colors as $color) {
            Color::create([
                'name' => [
                    'en' => $color['en'],
                    'ar' => $color['ar'],
                ],
            ]);
        }
    }
}
