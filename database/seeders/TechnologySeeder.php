<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technology; //continuo a dimenticare di aggiungere il model qui quando faccio seeding >:(
use Faker\Generator as Faker;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $technologiesName = [
            [
               "name"=>"PlayStation 2"
            ],
            [
                "name"=>"PlayStation 3"
            ],
            [
                "name"=>"PlayStation 4"
            ],
            [
                "name"=>"PlayStation 5"
            ],
            [
                "name"=>"Nintendo WiiU"
            ],
            [
                "name"=>"Xbox One"
            ],
            [
                "name"=>"Xbox Series X/S"
            ],
            [
                "name"=>"PC"
            ],
        ];

        foreach ($technologiesName as $technologyName) {
            $newTechnology = new Technology();
            $newTechnology->name = $technologyName['name'];
            $newTechnology-> save();
        }
    }
}