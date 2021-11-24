<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;   //   va el modelo a correspondiente a la tabla

class UserSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //datos del admin
        $user = new User;

        $user->name ="AhorroManager";
        $user->email ="Admin";
        $user->password ="admin";

        $user->save();

        //$user2 = new User;

        


    }
}
