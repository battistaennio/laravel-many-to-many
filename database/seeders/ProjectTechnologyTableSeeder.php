<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectTechnologyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 25; $i++) {
            $project = Project::inRandomOrder()->first();

            $tech_id = Technology::inRandomOrder()->first()->id;

            //aggiungo la relazione
            $project->technologies()->attach($tech_id);
        }
    }
}
