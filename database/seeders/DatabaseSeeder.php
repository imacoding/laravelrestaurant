<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
         
        
         /*$this->call(aboutseeder::class);*/
           $this->call(paymentseeder::class);
             /*$this->call(privacypolicyseeder::class);
              $this->call(termsseeder::class);
               $this->call(timeseeder::class);
                 $this->call(UsersTableSeeder::class);
                $this->call(UserRoleSeeder::class);
                   $this->call(ModelHasRoleSeeder::class);*/
               
                 
    }
}
