<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\ChangePost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        $post = Post::create([
            'titulo' => $validatedData['titulo'],
            'cuerpo' => $validatedData['cuerpo'],
            'id_user' => auth()->user()->id,
        ]);

        return redirect()->route('post.add-post')->with('success', 'El post ha sido creado exitosamente.');
    }

    public function index()
    {
        $perPage = 12;
        $posts = Post::latest()->paginate($perPage);
        $pagination = $posts->appends(['path' => route('home.index')]);
        $months = $this->getMonth();
        return view('home.index', compact('posts', 'pagination', 'months'));
    }

    private function getMonth()
    {
        $months = [
            1 => 'Ene', 2 => 'Feb', 3 => 'Mar', 4 => 'Abr',
            5 => 'May', 6 => 'Jun', 7 => 'Jul', 8 => 'Ago',
            9 => 'Sep', 10 => 'Oct', 11 => 'Nov', 12 => 'Dic'
        ];

        $monthsWithPublications = [];

        foreach ($months as $month => $spanishName) {
            $publications = DB::table('posts')
                ->select(DB::raw('COUNT(id) as amount'))
                ->whereRaw('MONTH(created_at) = ?', [$month])
                ->whereNull('deleted_at')
                ->value('amount');

            $monthsWithPublications[$month] = [
                'name' => $spanishName,
                'publications' => $publications > 0,
            ];
        }

        return $monthsWithPublications;
    }

    public function postForMonth($month)
    {
        $monthNum = $this->getMonthNumber($month);

        if ($monthNum !== null) {
            $posts = $this->getPostsForMonth($monthNum);
            $months = $this->getMonths();
            return view('post.post-for-month', compact('posts', 'months'));
        } else {
            return 'Mes inválido';
        }
    }

    private function getMonthNumber($month)
    {
        $months = [
            'Ene' => '01',
            'Feb' => '02',
            'Mar' => '03',
            'Abr' => '04',
            'May' => '05',
            'Jun' => '06',
            'Jul' => '07',
            'Ago' => '08',
            'Sep' => '09',
            'Oct' => '10',
            'Nov' => '11',
            'Dic' => '12',
        ];

        return $months[$month] ?? null;
    }

    private function getPostsForMonth($monthNum)
    {
        return Post::whereMonth('created_at', $monthNum)
            ->orderBy('created_at', 'desc')
            ->paginate(3);
    }

    private function getMonths()
    {
        return [
            'Ene' => ['num' => '01'],
            'Feb' => ['num' => '02'],
            'Mar' => ['num' => '03'],
            'Abr' => ['num' => '04'],
            'May' => ['num' => '05'],
            'Jun' => ['num' => '06'],
            'Jul' => ['num' => '07'],
            'Ago' => ['num' => '08'],
            'Sep' => ['num' => '09'],
            'Oct' => ['num' => '10'],
            'Nov' => ['num' => '11'],
            'Dic' => ['num' => '12'],
        ];
    }


    public function userPosts()
    {
        $userId = auth()->user()->id;
        $perPage = 5;
        $posts = Post::where('id_user', $userId)->latest()->paginate($perPage);
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
        $validatedData = $this->validatePostData($request);

        $post = $this->findPost($id);
        $changes = $this->comparePostChanges($post, $validatedData);
        $this->updatePostFields($post, $validatedData);
        $this->savePost($post);
        $this->createChangePost($post, $changes);

        return $this->redirectToUserPosts($id);
    }

    private function validatePostData(Request $request)
    {
        return $request->validate([
            'titulo' => 'required|max:255',
            'cuerpo' => 'required',
        ]);
    }

    private function findPost($id)
    {
        return Post::find($id);
    }

    private function comparePostChanges($post, $validatedData)
    {
        $changes = [];

        if ($post->titulo != $validatedData['titulo']) {
            $changes['titulo'] = true;
            $post->titulo = $validatedData['titulo'];
        }

        if ($post->cuerpo != $validatedData['cuerpo']) {
            $changes['cuerpo'] = true;
            $post->cuerpo = $validatedData['cuerpo'];
        }

        return $changes;
    }

    private function updatePostFields($post, $validatedData)
    {
        $post->titulo = $validatedData['titulo'];
        $post->cuerpo = $validatedData['cuerpo'];
    }

    private function savePost($post)
    {
        $post->save();
    }

    private function createChangePost($post, $changes)
    {
        if (!empty($changes)) {
            $changePost = new ChangePost();
            $changePost->id_post = $post->id;
            $changePost->id_user = auth()->user()->id;
            $changePost->titulo = isset($changes['titulo']);
            $changePost->cuerpo = isset($changes['cuerpo']);
            $changePost->save();
        }
    }

    private function redirectToUserPosts($id)
    {
        return redirect()->route('post.user-posts', ['id' => $id])->with('success', 'El post ha sido modificado exitosamente.');
    }
}
