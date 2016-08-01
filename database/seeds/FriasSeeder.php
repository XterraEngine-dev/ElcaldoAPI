<?php

use Illuminate\Database\Seeder;
use App\Frias;

class FriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Frias::create([
            'id' => 1,
            'nombre' => 'Fresco de tiste',
            'ingredientes' => 'ingredientes de Fresco de tiste',
            'preparacion' => 'preparacion de Fresco de tiste',
            'imagen' => 'iamgen de atol de Fresco de tiste',
        ]);
        Frias::create([
            'id' => 2,
            'nombre' => 'Batido de leche',
            'ingredientes' => 'ingredientes Batido de leche',
            'preparacion' => 'prepracion de Batido de leche',
            'imagen' => 'imagen de caldo de Batido de leche',
        ]);
    }
}
