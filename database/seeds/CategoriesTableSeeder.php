<?php
use App\Models\Category;
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
//        $category = factory(CategoryCms::class,10)->create();
        $category = Category::create([
            'name' => 'Money'
        ]);
        $category = Category::create([
            'name' => 'Furniture'
        ]);
        $category = Category::create([
            'name' => 'Food'
        ]);
        $category = Category::create([
            'name' => 'Clothing'
        ]);
        $category = Category::create([
            'name' => 'Electronic'
        ]);
        $category = Category::create([
            'name' => 'Other'
        ]);
    }
}
