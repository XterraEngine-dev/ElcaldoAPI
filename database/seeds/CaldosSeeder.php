<?php

use Illuminate\Database\Seeder;
use App\Caldos;
class CaldosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Caldos::create([
            'id' => 1,
            'nombre' => 'Caldo de pata',
            'ingredientes' => 'ingredientes de caldo de pata',
            'preparacion' => 'preparacion de caldo de pata',
            'imagen' => 'iamgen de caldo de pata',
        ]);
        Caldos::create([
            'id' => 2,
            'nombre' => 'caldo de res',
            'ingredientes' => 'ingredientesw de caldo de res',
            'preparacion' => 'prepracion de preparacion caldo de res',
            'imagen' => 'imagen de caldo de res',
        ]);
    }
}
