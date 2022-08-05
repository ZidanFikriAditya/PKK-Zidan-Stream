<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = ['Horror', 'Action', 'Documentary', 'Anime'];

        foreach ($arr as $key => $value){
            $ctg = new Category;
            $ctg->name = $value;
            $ctg->save();
        }
    }
}
