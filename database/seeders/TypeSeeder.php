<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Generator $faker): void
    {
        $labels = ['FrontEnd', 'BackEnd', 'FullStack', 'API', 'Design', 'UI/UX'];
        foreach ($labels as $label) {
            $types = new Type();
            $types->label = $label;
            $types->color = $faker->hexColor();
            $types->save();
        }
    }
}
