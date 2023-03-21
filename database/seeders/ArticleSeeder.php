<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

$faker = Faker::create();

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 20; $i++) {
            DB::table('articles')->insert([
                'id' => $i,
                'title' => $faker->sentence,
                'content' => $faker->text,
                'created_at' => $faker->dateTimeThisMonth($max = 'now', $timezone = null),
            ]);
            DB::table('likes')->insert([
                'article_id' => $i,
                'counter' => $faker->numberBetween(0,120),
            ]);
            DB::table('views')->insert([
                'article_id' => $i,
                'counter' => $faker->numberBetween(0,120),
            ]);
        }
    }
}
