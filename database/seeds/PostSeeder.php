<?php

use App\User;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // Pluck the category IDs and transform them into array format
        $category_ids = Category::pluck('id')->toArray();
        $user_ids = User::pluck('id')->toArray();
        $tag_ids = Tag::all('id');

        for ($i = 0; $i < 50; $i++) {
            $post = new Post();
            $post->user_id = Arr::random($user_ids);
            $post->category_id = Arr::random($category_ids);
            $post->title = $faker->sentence(2);
            $post->content = $faker->paragraphs(3, true);
            // $post->image = $faker->imageUrl(360, 360);
            $post->is_published = $faker->boolean();
            $post->slug = Str::slug($post->title, '-');
            $post->save();
        }

        $post->each(function (App\Models\Post $p) use ($tag_ids) {
            $p->tags()->attach(
                $tag_ids->random(rand(0, 4))->pluck('id')->toArray()
            );
        });
    }
}
