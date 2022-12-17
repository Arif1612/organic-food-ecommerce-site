<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // DB::table('categories')->insert([
        //     'title' => 'Category 1',
        //     'is_active' => true
        // ]);

        Category::create([
            'name' => 'Kids',
            'is_active' => true
        ]);

        Category::create([
            'name' => 'Men',
            'is_active' => true
        ]);

        Category::create([
            'name' => 'Women',
            'is_active' => true
        ]);

        Category::create([
            'name' => 'Lifestyle',
            'is_active' => false
        ]);

        // $categories = ['Fruits', 'Vegetables', 'Drinks', 'Ingredients'];
        // foreach ($categories as $category) {
        //     Category::create([
        //         'name' => $category,
        //         'is_active' => true
        //     ]);
        // }
    }
}
