<?php

use Illuminate\Database\Seeder;
use App\Calientes;

class CalientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Calientes::create([
            'id' => 1,
            'nombre' => 'atol de elote',
            'ingredientes' => 'ingredientes de atol de elote',
            'preparacion' => 'preparacion de atol de elote',
            'imagen' => 'iamgen de atol de elote',
        ]);
        Calientes::create([
            'id' => 2,
            'nombre' => 'atol shuco',
            'ingredientes' => 'ingredientesw de atol shuco',
            'preparacion' => 'prepracion de atol shuco',
            'imagen' => 'imagen de caldo de atol shuco',
        ]);
    }
}
