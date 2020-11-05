<?php

use Illuminate\Database\Seeder;
use App\Models\Menu;
use App\Models\Category;

class MenusSeeder extends Seeder
{

    public function run()
    {
        $categories = factory(Category::class, 5)->create();
        $categories->each(function($category){
            factory(Menu::class, 3)->create([
                'category_id' => $category->id
            ]);
        });
    }
    
}
