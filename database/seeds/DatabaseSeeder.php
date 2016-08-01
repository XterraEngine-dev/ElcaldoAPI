<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $this->call(CaldosSeeder::class);
        $this->call(CalientesSeeder::class);
        $this->call(FriasSeeder::class);
        $this->call(OtrasSeeder::class);
        $this->call(TamalesSeeder::class);
        $this->call(PostresSeeder::class);

        
    }
}
