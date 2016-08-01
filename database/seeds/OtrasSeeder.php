<?php

use Illuminate\Database\Seeder;
use App\Otras;

class OtrasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Otras::create([
            'id' => 1,
            'nombre' => 'Chirmol',
            'ingredientes' => 'ingredientes de Chirmol',
            'preparacion' => 'preparacion de Chirmol',
            'imagen' => 'iamgen de atol de Chirmol',
        ]);
        Otras::create([
            'id' => 2,
            'nombre' => 'Chancletas',
            'ingredientes' => 'ingredientes Chancletas',
            'preparacion' => 'prepracion de Chancletas',
            'imagen' => 'imagen de caldo de Chancletas',
        ]);
    }
}
