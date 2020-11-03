<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

use Faker;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('ru_RU');
        $categories = DB::table('categories')->select(['id'])->get()->toArray();

        for ($i = 0; $i < 10; $i++) {
            DB::table('news')->insert([
                'title'      => $faker->realText(50),
                'short_text'  => $faker->realText(),
                'full_text'   => $faker->realText(1000),
                'photo'      => $faker->imageUrl(),
                'category_id' => $categories[array_rand($categories)]->id,
            ]);
        }
    }
}
