<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\CambioPost;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function showPost($id)
    {
        $post = Post::find($id);
        return view('post.show-post', compact('post', 'id'));
    }

    public function showAddPost()
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

        return redirect()->route('post.add-post')->with('success', 'El post ha sido creado exitosamente.');
    }

    public function index()
    {
        $posts = Post::latest()->take(3)->get();

        return view('home.index', compact('posts'));
    }

    public function userPosts()
    {
        $userId = auth()->user()->id;
        $posts = Post::where('id_user', $userId)->latest()->get();
    
        return view('post.user-posts', compact('posts'))->with('softDeleteUrl', route('post.user-posts'));
    }
    

    public function softDeletePost($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->back()->with('success', 'El post ha sido eliminado exitosamente.');
    }
    
    public function showEditPost($id)
    {
        $post = Post::find($id);
        return view('post.modify-post', compact('post'));
    }

    public function updatePost(Request $request, $id)
    {
        $validatedData = $request->validate([
            'titulo' => 'required|max:255',
            'cuerpo' => 'required',
        ]);

        $post = Post::find($id);
        $post->titulo = $validatedData['titulo'];
        $post->cuerpo = $validatedData['cuerpo'];
        $post->save();

        $cambioPost = new CambioPost();
        $cambioPost->id_post = $post->id;
        $cambioPost->id_user = auth()->user()->id;
        $cambioPost->save();

        return redirect()->route('post.user-posts', ['id' => $id])->with('success', 'El post ha sido modificado exitosamente.');
    }
    
}
