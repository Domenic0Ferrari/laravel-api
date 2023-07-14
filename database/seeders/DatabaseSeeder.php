<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Technology;
use Illuminate\Database\Seeder;

use function PHPSTORM_META\type;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            TypesTableSeeder::class,
            TechnologiesTableSeeder::class,
            ProjectsTableSeeder::class,
        ]);
    }
}
