<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

$faker = Faker::create();

$array = array("foo", "bar", "hello", "world");

class TagsSeeder extends Seeder {
    public function run(): void {
        $array = array("one", "two", "three", "four");

        $faker = Faker::create();

        for ($i = 1; $i <= 20; $i++) {
            $tagged = false;

            for ($j = 0; $j <= 3; $j++) {
                if ($faker->numberBetween(0,1)) {
                    DB::table('tags')->insert([
                        'article_id' => $i,
                        'tag_name' => $array[$j]
                    ]);

                    $tagged = true;
                }

            }

            // make sure at least one tag is added
            if (!$tagged) {
                DB::table('tags')->insert([
                    'article_id' => $i,
                    'tag_name' => $array[$faker->numberBetween(0,3)]
                ]);
            }
        }
    }
}
