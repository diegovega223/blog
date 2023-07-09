<?php

namespace App\Http\Controllers;

use App\Models\ChangePost;
use App\Models\Post;

class ChangePostController extends Controller
{
    public function showChangePost($id)
    {
        $post = Post::find($id);
        $changes = ChangePost::where('id_post', $id)->get();

        $changesData = [];

        foreach ($changes as $change) {
            $changeData = [
                'fecha' => $change->created_at,
                'titulo' => $change->titulo,
                'cuerpo' => $change->cuerpo,
            ];

            $changesData[] = $changeData;
        }

        return view('post.changes-post', compact('post', 'changesData'));
    }
}
