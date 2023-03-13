<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $type_ids = Type::select('id')->pluck('id')->toArray();
        $type_ids[] = null;

        for ($i = 0; $i < 10; $i++) {
            $project = new Project();
            $project->type_id = Arr::random($type_ids);
            $project->name = $faker->words(3, true);
            $project->description = $faker->paragraphs(6, true);
            $project->github = "https://github.com/MarcoCalabretta1988";
            $project->linkedin = "www.linkedin.com/in/marco-calabretta-2b1b13195";
            $project->save();
        }
    }
}
