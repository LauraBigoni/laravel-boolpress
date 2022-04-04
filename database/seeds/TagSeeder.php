<?php

use App\Models\Tag;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $tag_labels = [
            'Art', 'Photo', 'Nature', 'Travel', 'Style', 'Fun', 'Music', 'Sports', 'TV', 'Reading', 'Computer', 'Software', 'Music', 'Models'
        ];

        foreach ($tag_labels as $tag_label) {
            $tag = new Tag();
            $tag->label = $tag_label;
            $tag->color = $faker->hexColor();
            $tag->save();
        }
    }
}
