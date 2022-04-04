<?php

use App\User;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 6; $i++) {
            $user = new User();
            $user->name = $faker->userName();
            $user->email = $faker->email();
            $user->password = bcrypt($faker->password());
            $user->save();
        }

        // ! solo per non registrarmi ogni volta che refresho 
        $admin = new User();
        $admin->name = 'Laura';
        $admin->email = 'lau@bool.it';
        $admin->password = bcrypt('password');
        $admin->save();
    }
}
