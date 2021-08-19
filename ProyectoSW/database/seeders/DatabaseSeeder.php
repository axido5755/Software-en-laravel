<?php

namespace Database\Seeders;

use App\Models\clausula;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         //\App\Models\User::factory(10)->create();

         $this->call(ClausulaSeeder::class);
         //$this->insertarPerfil();
        
    }

}
