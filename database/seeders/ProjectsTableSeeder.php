<?php

namespace Database\Seeders;

use App\Functions\Helper;
use App\Models\Project;
use App\Models\Type;
use Faker\Generator as Faker;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 50; $i++) {

            $new_project = new Project();
            $new_project->type_id = Type::inRandomOrder()->first()->id;
            $new_project->name = $faker->sentence();
            $new_project->slug = Helper::generateSlug($new_project->name, Project::class);
            $new_project->start_date = $faker->dateTimeBetween('-5 months', '-3 days');
            $new_project->repo_link = 'https://github.com/battistaennio/laravel-one-to-many';
            $new_project->description = $faker->paragraph();
            $new_project->save();
        }
    }
}
