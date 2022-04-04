<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['label' => 'Design', 'color' => 'danger'],
            ['label' => 'Social Network', 'color' => 'success'],
            ['label' => 'Buisness', 'color' => 'info'],
            ['label' => 'Tecnology', 'color' => 'warning'],
            ['label' => 'Fashion', 'color' => 'primary'],
            ['label' => 'Hobbies', 'color' => 'light'],
            ['label' => 'Cooking', 'color' => 'secondary'],
            ['label' => 'Cosmetics', 'color' => 'dark'],
        ];

        foreach ($categories as $category) {
            $c = new Category();
            $c->label = $category['label'];
            $c->color = $category['color'];

            $c->save();
        }
    }
}
