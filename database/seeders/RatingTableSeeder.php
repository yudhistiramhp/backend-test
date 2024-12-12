<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rating;

class RatingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $chunk = 1000;
        $totalRatings = 500000;
        
        for ($i = 0; $i < ceil($totalRatings / $chunk); $i++) {
            $ratings = Rating::factory($chunk)->make()->toArray();
            Rating::insert($ratings);
        }
    }

    

}
