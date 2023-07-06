<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show()
    {
        return view('post.add-post');
    }

    public function addPost(Request $request)
    {
        $validatedData = $request->validate([
            'titulo' => 'required|max:255',
            'cuerpo' => 'required',
        ]);

        $post = new Post();
        $post->titulo = $validatedData['titulo'];
        $post->cuerpo = $validatedData['cuerpo'];
        $post->id_user = auth()->user()->id;
        $post->save();

        return redirect()->route('add-post')->with('success', 'El post ha sido creado exitosamente.');
    }
}
