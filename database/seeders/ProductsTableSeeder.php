<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'iPhone X 64GB',
                'name_en' => 'iPhone X 64GB',
                'code' => 'iphone_x_64',
                'description' => 'Отличный продвинутый телефон с памятью на 64 gb',
                'description_en' => 'Excellent advanced phone with 64 gb memory',
                'price' => '71990',
                'category_id' => 1,
                'image' => 'products/iphone_x.jpg',
                'hit' => 1,
                'new' => 1,
                'recommend' => 1,
                'count' => 2,
            ],
            [
                'name' => 'iPhone X 256GB',
                'name_en' => 'iPhone X 256GB',
                'code' => 'iphone_x_256',
                'description' => 'Отличный продвинутый телефон с памятью на 256 gb',
                'description_en' => 'Excellent advanced phone with 64 gb memory',
                'price' => '89990',
                'category_id' => 1,
                'image' => 'products/iphone_x_silver.jpg',
                'hit' => 0,
                'new' => 1,
                'recommend' => 0,
                'count' => 0,
            ],
            [
                'name' => 'HTC One S',
                'name_en' => 'HTC One S',
                'code' => 'htc_one_s',
                'description' => 'Зачем платить за лишнее? Легендарный HTC One S',
                'description_en' => 'Why pay for excess? Legendary HTC One S',
                'price' => '12490',
                'category_id' => 1,
                'image' => 'products/htc_one_s.png',
                'hit' => 0,
                'new' => 0,
                'recommend' => 1,
                'count' => 2,

            ],
            [
                'name' => 'iPhone 5SE',
                'name_en' => 'iPhone 5SE',
                'code' => 'iphone_5se',
                'description' => 'Отличный классический iPhone',
                'description_en' => 'Great classic iPhone',
                'price' => '17221',
                'category_id' => 1,
                'image' => 'products/iphone_5.jpg',
                'hit' => 0,
                'new' => 0,
                'recommend' => 0,
                'count' => 0,

            ],
            [
                'name' => 'Наушники Beats Audio',
                'name_en' => 'Headphones Beats Audio',
                'code' => 'beats_audio',
                'description' => 'Отличный звук от Dr. Dre',
                'description_en' => 'Great sound from Dr. Dre',
                'price' => '20221',
                'category_id' => 2,
                'image' => 'products/beats.jpg',
                'hit' => 0,
                'new' => 0,
                'recommend' => 0,
                'count' => 8,

            ],
            [
                'name' => 'Камера GoPro',
                'name_en' => 'Сamera GoPro',
                'code' => 'gopro',
                'description' => 'Снимай самые яркие моменты с помощью этой камеры',
                'description_en' => 'Capture your highlights with this camera',
                'price' => '12000',
                'category_id' => 2,
                'image' => 'products/gopro.jpg',
                'hit' => 0,
                'new' => 0,
                'recommend' => 0,
                'count' => 1,

            ],
            [
                'name' => 'Камера Panasonic HC-V770',
                'name_en' => 'Сamera Panasonic HC-V770',
                'code' => 'panasonic_hc-v770',
                'description' => 'Для серьёзной видео съемки нужна серьёзная камера. Panasonic HC-V770 для этих целей лучший выбор!',
                'description_en' => 'Serious video shooting requires a serious camera. Panasonic HC-V770 is the best choice for these purposes!',
                'price' => '27900',
                'category_id' => 2,
                'image' => 'products/video_panasonic.jpg',
                'hit' => 1,
                'new' => 1,
                'recommend' => 0,
                'count' => 0,
            ],
            [
                'name' => 'Кофемашина DeLongi',
                'name_en' => 'DeLongi coffee machine',
                'code' => 'delongi',
                'description' => 'Хорошее утро начинается с хорошего кофе!',
                'description_en' => 'A good morning starts with good coffee!',
                'price' => '25200',
                'category_id' => 3,
                'image' => 'products/delongi.jpg',
                'hit' => 1,
                'new' => 0,
                'recommend' => 0,
                'count' => 2,

            ],
            [
                'name' => 'Холодильник Haier',
                'name_en' => 'Refrigerator Haier',
                'code' => 'haier',
                'description' => 'Для большой семьи большой холодильник!',
                'description_en' => 'For a large family, a large refrigerator!',
                'price' => '40200',
                'category_id' => 3,
                'image' => 'products/haier.jpg',
                'hit' => 1,
                'new' => 0,
                'recommend' => 1,
                'count' => 5,

            ],
            [
                'name' => 'Блендер Moulinex',
                'name_en' => 'Blender Moulinex',
                'code' => 'moulinex',
                'description' => 'Для самых смелых идей',
                'description_en' => 'For the most daring ideas',
                'price' => '4200',
                'category_id' => 3,
                'image' => 'products/moulinex.jpg',
                'hit' => 0,
                'new' => 1,
                'recommend' => 0,
                'count' => 10,
            ],
            [
                'name' => 'Мясорубка Bosch',
                'name_en' => 'Meat grinder Bosch',
                'code' => 'bosch',
                'description' => 'Любите домашние котлеты? Вам определенно стоит посмотреть на эту мясорубку!',
                'description_en' => 'Do you like homemade cutlets? You should definitely take a look at this meat grinder!',
                'price' => '9200',
                'category_id' => 3,
                'image' => 'products/bosch.jpg',
                'hit' => 0,
                'new' => 1,
                'recommend' => 0,
                'count' => 2,
            ],
        ]);
    }
}
