<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class VesselSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,50) as $item) {
            DB::table('vessels')->insert([
                'name'  =>  $faker->firstNameFemale,
                'imo_number'    =>  Str::random(7)
            ]);
        }
    }
}
