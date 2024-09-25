<?php

namespace Database\Seeders;

use App\Functions\Helper;
use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = ['Front End', 'Back End', 'Design', 'UX', 'Laravel', 'VueJS', 'Angular', 'React'];

        foreach ($data as $tech) {
            $new_tech = new Technology();
            $new_tech->name = $tech;
            $new_tech->slug = Helper::generateSlug($new_tech->name, Technology::class);
            $new_tech->save();
        }
    }
}
