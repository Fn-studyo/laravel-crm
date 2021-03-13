<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \Faker\Factory as Faker;
use Illuminate\Support\Str;
use App\Models\Upcoming;

class UpcomingSeeder extends Seeder
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
            Upcoming::create([
                'completed' => false,
                'title' => $fake->sentence($nbWords = 4, $valBeWords = false),
                'approved' => false,
                'waiting' => true,
                'taskId' => Str::random(10)
            ]);
        }
    }
}
