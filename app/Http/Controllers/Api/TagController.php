<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::orderBy('updated_at', 'DESC')->get();
        return response()->json($tags);
    }

    /**
     * Display the specified resource.
     *
     * @param  Int $id
     * @return \Illuminate\Http\Response
     */
    public function show($label)
    {
        $tag = Tag::where('label', $label)->first();
        if (!$tag) return response('Post Not Found', 404);
        return response()->json($tag);
    }
}
