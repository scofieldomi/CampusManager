<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
       $user=  App\User::create([
        
            'name'      => 'BAGRE Dominique',
            'email'     => 'bagre.dominique@gmail.com',
            'password'  => bcrypt('arbres'),
            'admin'     => 1
        
        ]);
    }
}
