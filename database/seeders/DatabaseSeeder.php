<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call(UserSedder::class); //conecta el seeder del modelo user


        //User::factory(50)->create();//el numero modifica la creacion de registros usando database\factories\Userfactory.php
    }
}
