<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;
use Faker\Factory as Faker;

class PostsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('es_UY');
        $users = User::all();

        foreach ($users as $user) {
            for ($i = 0; $i < 5; $i++) {
                $titulo = $faker->sentence;
                $cuerpo = $faker->paragraph;

                $post = new Post();
                $post->titulo = $titulo;
                $post->cuerpo = $cuerpo;
                $post->id_user = $user->id;
                $post->save();
            }
        }
    }
}