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

        $urls = [
            'https://images.unsplash.com/photo-1529107386315-e1a2ed48a620?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1920&q=80',
            'https://images.unsplash.com/photo-1569163139250-c90980db6853?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1920&q=80',
            'https://images.unsplash.com/photo-1541872705-1f73c6400ec9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1920&q=80',
        ];

        for ($i = 0; $i < 4; $i++) {
            DB::table('categories')->insert([
                'name'        => $faker->sentence(1),
                'description' => $faker->realText(50),
                'photo'       => $urls[array_rand($urls)],
            ]);
        }
    }
}
