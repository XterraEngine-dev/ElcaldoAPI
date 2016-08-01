<?php

use Illuminate\Database\Seeder;
use App\Tamales;

class TamalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tamales::create([
            'id' => 1,
            'nombre' => 'Tamal negro',
            'ingredientes' => 'ingredientes de Tamal negro',
            'preparacion' => 'preparacion de Tamal negro',
            'imagen' => 'imagen de Tamal negro',
        ]);
        Tamales::create([
            'id' => 2,
            'nombre' => 'Tamal negro',
            'ingredientes' => 'ingredientes Tamal negro',
            'preparacion' => 'prepracion de Tamal negro',
            'imagen' => 'imagen  de Tamal negro',
        ]);
    }
}
