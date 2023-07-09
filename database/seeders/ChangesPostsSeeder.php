<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;
use App\Models\ChangePost;

class ChangesPostsSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();
        $posts = Post::all();

        foreach ($posts as $post) {

            $numChanges = rand(0, 5);

            $selectedUsers = $users->random($numChanges);

            foreach ($selectedUsers as $user) {
                $change = new ChangePost([
                    'id_post' => $post->id,
                    'id_user' => $user->id,
                    'titulo' => rand(0, 1),
                    'cuerpo' => rand(0, 1),
                ]);
                $change->save();
            }
        }
    }
}
