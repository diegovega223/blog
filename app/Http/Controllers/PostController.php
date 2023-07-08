<?php
namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\CambioPost;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
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

        $post = new Post();
        $post->titulo = $validatedData['titulo'];
        $post->cuerpo = $validatedData['cuerpo'];
        $post->id_user = auth()->user()->id;
        $post->save();

        return redirect()->route('post.add-post')->with('success', 'El post ha sido creado exitosamente.');
    }

    public function index()
{
    $perPage = 3;
    $posts = Post::orderBy('created_at', 'desc')->paginate($perPage);
    $pagination = new LengthAwarePaginator(
        $posts->items(),
        $posts->total(),
        $perPage,
        $posts->currentPage(),
        ['path' => route('home.index')]
    );
    $months = $this->getMonth();
    return view('home.index', compact('posts', 'pagination', 'months'));
}


    private function getMonth()
    {
        $results = DB::select("
            SELECT m.month, m.spanish_name, COUNT(p.id) AS amount
            FROM (
                SELECT 1 AS month, 'Ene' AS spanish_name UNION
                SELECT 2 AS month, 'Feb' AS spanish_name UNION
                SELECT 3 AS month, 'Mar' AS spanish_name UNION
                SELECT 4 AS month, 'Abr' AS spanish_name UNION
                SELECT 5 AS month, 'May' AS spanish_name UNION
                SELECT 6 AS month, 'Jun' AS spanish_name UNION
                SELECT 7 AS month, 'Jul' AS spanish_name UNION
                SELECT 8 AS month, 'Ago' AS spanish_name UNION
                SELECT 9 AS month, 'Sep' AS spanish_name UNION
                SELECT 10 AS month, 'Oct' AS spanish_name UNION
                SELECT 11 AS month, 'Nov' AS spanish_name UNION
                SELECT 12 AS month, 'Dic' AS spanish_name
            ) m
            LEFT JOIN posts p ON MONTH(p.created_at) = m.month AND p.deleted_at IS NULL
            GROUP BY m.month, m.spanish_name
        ");
        
        $monthsWithPublications = [];
        foreach ($results as $result) {
            $monthsWithPublications[$result->month] = [
                'name' => $result->spanish_name,
                'publications' => ($result->amount > 0),
            ];
        }
    
        return $monthsWithPublications;
    }
    

 public function postForMonth($month)
    {
        $months = [
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
    
        if (isset($months[$month])) {
            $monthNum = $months[$month]['num'];
            $posts = Post::whereMonth('created_at', $monthNum)->orderBy('created_at', 'desc')->paginate(3);
            return view('post.post-for-month', compact('posts', 'months'));
        } else {
            return 'Mes inválido';
        }
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
        $validatedData = $request->validate([
            'titulo' => 'required|max:255',
            'cuerpo' => 'required',
        ]);

        $post = Post::find($id);
        $cambios = [];

        if ($post->titulo != $validatedData['titulo']) {
            $cambios['titulo'] = true;
            $post->titulo = $validatedData['titulo'];
        }

        if ($post->cuerpo != $validatedData['cuerpo']) {
            $cambios['cuerpo'] = true;
            $post->cuerpo = $validatedData['cuerpo'];
        }

        $post->save();

        if (!empty($cambios)) {
            $cambioPost = new CambioPost();
            $cambioPost->id_post = $post->id;
            $cambioPost->id_user = auth()->user()->id;
            $cambioPost->titulo = isset($cambios['titulo']);
            $cambioPost->cuerpo = isset($cambios['cuerpo']);
            $cambioPost->save();
        }
        return redirect()->route('post.user-posts', ['id' => $id])->with('success', 'El post ha sido modificado exitosamente.');
    }

    public function showCambioPost($id)
    {
        $post = Post::find($id);
        $cambios = CambioPost::where('id_post', $id)->get();

        $cambiosData = [];

        foreach ($cambios as $cambio) {
            $cambioData = [
                'fecha' => $cambio->created_at,
                'titulo' => $cambio->titulo,
                'cuerpo' => $cambio->cuerpo,
            ];

            $cambiosData[] = $cambioData;
        }
        return view('post.cambios-post', compact('post', 'cambiosData'));
    }

}
