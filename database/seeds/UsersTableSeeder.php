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
        //
        $user = \App\User::create([
            'name' => 'Victor Souto',
            'password' => \Illuminate\Support\Facades\Hash::make('12345'),
            'email' => 'souto.victor@gmail.com'
        ]);


        $user = \App\User::create([
            'name' => 'Kleber',
            'password' => \Illuminate\Support\Facades\Hash::make('12345'),
            'email' => 'kleber.junior@mjv.com.br'
        ]);
        
    }
}
