<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Favorite;
use App\Models\Product;



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
        User::factory(499)->create();//el numero modifica la creacion de registros usando database\factories\Userfactory.php

        $this->call(ProductSeeder::class);
        Product::factory(499)->create();
    
        $this->call(FavoriteSeeder::class);
        Favorite::factory(50)->create();
        
        


    }
}
