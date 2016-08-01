<?php

use Illuminate\Database\Seeder;
use App\Postres;
class PostresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Postres::create([
            'id' => 1,
            'nombre' => 'Camote en dulce',
            'ingredientes' => 'ingredientes de Camote en dulce',
            'preparacion' => 'preparacion de Camote en dulce',
            'imagen' => 'iamgen de atol de Camote en dulce',
        ]);
        Postres::create([
            'id' => 2,
            'nombre' => 'Chiquiadores',
            'ingredientes' => 'ingredientes Chiquiadores',
            'preparacion' => 'prepracion de Chiquiadores',
            'imagen' => 'imagen de caldo de Chiquiadores',
        ]);
    }
}
