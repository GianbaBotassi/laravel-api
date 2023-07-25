<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

use App\Models\Type;

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nomiTypes = ['Corso Boolean', 'Personale', 'Lavoro', 'Università'];

        foreach ($nomiTypes as $nome) {
            $type = new Type();
            $type->name = $nome;
            $type->save();
        }
    }
}
