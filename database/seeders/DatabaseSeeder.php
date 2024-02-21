<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Faker\Factory as  Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Faker::create('it_IT');
        $mastersCount = 20;

        foreach (range(1, 20) as $_) {

            DB::table('masters')->insert([
                'name' => $faker->firstName(),
                'surname' => $faker->lastName(),
            ]);
        }

        $outfits = ['Jacket', 'Shorts', 'Shirts', 'Coat', 'Pantes', 'Hat', 'Gloves', 'Skirt', 'Jeans'];

        foreach (range(1, 200) as $_) {

            DB::table('outfits')->insert([
                'type' => $outfits[rand(0, count($outfits) - 1)],
                'color' => $faker->safeColorName(),
                'size' => rand(5, 22),
                'about' => $faker->paragraph(5),
                'master_id' => rand(1, $mastersCount)

            ]);
        }


        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
