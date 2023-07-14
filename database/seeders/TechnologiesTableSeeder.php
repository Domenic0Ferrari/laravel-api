<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TechnologiesTableSeeder extends Seeder
{
    public function run()
    {
        foreach (config('technologies') as $technology) {
            $name = $technology['name'];
            $slug = Technology::slugger($name);

            $technologyModel = Technology::create([
                'name' => $technology['name'],
                'slug' => $slug
            ]);
        }
    }
}
