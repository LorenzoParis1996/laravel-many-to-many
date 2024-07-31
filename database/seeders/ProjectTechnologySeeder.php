<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technology;
use App\Models\Project;
use Faker\Generator as Faker;

class ProjectTechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $projects = Project::all();
        $technologies = Technology::all()->pluck('id');

        foreach($projects as $project) {
            $project->technologies()->attach($faker->randomElements($technologies, rand(2, 5)));
        }
    }
}