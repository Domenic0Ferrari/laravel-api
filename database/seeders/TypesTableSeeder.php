<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TypesTableSeeder extends Seeder
{
    public function run()
    {

        foreach (config('types') as $type) {
            $name = $type['name'];
            $slug = Type::slugger($name);
            $typeModel = Type::create([
                'name' => $type['name'],
                'description' => $type['description'],

                'slug' => $slug,
            ]);
        }
    }
}
