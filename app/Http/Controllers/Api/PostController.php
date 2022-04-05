<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('is_published', 1)->orderBy('updated_at', 'DESC')->with('author', 'category', 'tags')->paginate(6);
        return response()->json($posts);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        // Uso first al posto di get, get da un array(collection), e il first alla prima corrispondenza si ferma. Il find funziona solo sulla colonna id
        $post = Post::where('slug', $slug)->with('author', 'category', 'tags')->first();
        if (!$post) return response('Post Not Found', 404);
        return response()->json($post);
    }
}
