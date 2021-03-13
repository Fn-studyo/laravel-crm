<?php

namespace Database\Seeders;

use App\Models\Today;
use Illuminate\Support\Str;
use \Faker\Factory as Faker;
use Illuminate\Database\Seeder;


class TodaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fake = Faker::create();

        for ($i=0; $i <5 ; $i++) { 
            Today::create([
                'completed' => false,
                'title' => $fake->sentence($nbWords = 4, $valBeWords = false),
                'approved' => false,
                'taskId' => Str::random(10)
            ]);
        }  
    }
}
