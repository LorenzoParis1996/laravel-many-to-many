<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;
use Faker\Generator as Faker;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $typesName = [
            "Beat 'em up",
            "Turn-based combat"
        ];

        foreach ($typesName as $typeName) {
            $newType= new Type();
            $newType->name = $typeName;
            $newType->color = $faker->unique()->safeHexColor();
            $newType-> save();
        }
    }
}