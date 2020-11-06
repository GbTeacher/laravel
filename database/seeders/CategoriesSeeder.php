<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;
use Faker;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('ru_RU');

        for ($i = 0; $i < 4; $i++) {
            DB::table('categories')->insert([
                'name'        => $faker->sentence(1),
                'description' => $faker->realText(50),
                'photo'       => $faker->imageUrl(),
            ]);
        }
    }
}
