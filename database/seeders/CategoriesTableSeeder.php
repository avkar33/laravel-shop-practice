<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(
            [
                [
                    'name' => 'Мобильные телефоны',
                    'name_en' => 'Mobile phones',
                    'code' => 'mobiles',
                    'description' => 'В этом разделе вы найдёте самые популярные мобильные телефонамы по отличным ценам!',
                    'description_en' => 'In this section you will find the most popular mobile phones at great prices!',
                    'image' => 'categories/mobile.jpg',
                ],
                [
                    'name' => 'Портативная техника',
                    'name_en' => 'Portable technology',
                    'code' => 'portable',
                    'description' => 'Раздел с портативной техникой.',
                    'description_en' => 'Section with portable equipment',
                    'image' => 'categories/portable.jpg',
                ],
                [
                    'name' => 'Бытовая техника',
                    'name_en' => 'Appliances',
                    'code' => 'appliances',
                    'description' => 'Раздел с бытовой техникой',
                    'description_en' => 'Section with household appliances',
                    'image' => 'categories/appliance.jpg',
                ],
            ]
        );
    }
}
