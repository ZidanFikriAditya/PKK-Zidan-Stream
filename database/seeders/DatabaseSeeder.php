<?php

namespace Database\Seeders;

use App\Models\Package;
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
        
            $pck = new Package;
            $pck->name = 'Bronze';
            $pck->harga = '30000';
            $pck->jangka_waktu = '20';
            $pck->save();
            
            $pck = new Package;
            $pck->name = 'Silver';
            $pck->harga = '50000';
            $pck->jangka_waktu = '30';
            $pck->save();

            $pck = new Package;
            $pck->name = 'Premium';
            $pck->harga = '500000';
            $pck->jangka_waktu = '365';
            $pck->save();

    }       
}
