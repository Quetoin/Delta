<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
          "name" =>"Polo",
          "slug" => "polo"
        ]);

        Category::create([
          "name" =>"T-shirt",
          "slug" => "t-shirt"
        ]);

        Category::create([
          "name" =>"Sweat",
          "slug" => "sweat"
        ]);

        Category::create([
          "name" =>"Chemise",
          "slug" => "chemise"
        ]);
    }
}
