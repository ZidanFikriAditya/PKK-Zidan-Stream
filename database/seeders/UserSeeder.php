<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = ['admin'];
        foreach ($arr as $key => $value){
            $us = new User;
            $us->name = $value;
            $us->username = $value;
            $us->email = $value . '@gmail.com';
            $us->level_user = 'admin';
            $us->password = bcrypt('123123');
            $us->save();
            
        }
    }
}
