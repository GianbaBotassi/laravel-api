<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Project;
use App\Models\Type;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Creazione di tot progetti
        $projects = Project::factory()->count(10)->make();

        // Ciclo i vari progetti creati
        foreach ($projects as $project) {

            // Prendo un modello type a caso
            $type = Type::inRandomOrder()->first();
            // Il type_id sarà uguale all'id del modello preso a caso
            // N.B. inRandomOrder prende il modello, poi bisogna specificare il dato (->id)
            $project->type_id = $type->id;
            $project->save();
        }
    }
}
