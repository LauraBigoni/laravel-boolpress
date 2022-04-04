<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Tag $tag)
    {
        $tags = Tag::all();
        $categories = Category::all();
        $posts = Post::orderBy('updated_at', 'DESC')->paginate(10);
        return view('admin.tags.index', compact('posts', 'categories', 'tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tag = new Tag();
        return view('admin.tags.create', compact('tag'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'label' => 'required|string|unique:tags|min:2|max:20',
            'color' => 'unique:tags'
        ], [
            'required' => 'Il campo :attribute è obbligatorio.',
            'label.unique' => "$request->label esiste già.",
            'min' => 'Nome troppo corto.',
            'max' => 'Nome troppo lungo.',
            'color.unique' => 'Il colore esiste già'
        ]);

        $data = $request->all();
        $tag = new tag();
        $tag->fill($data);
        $tag->save();
        return redirect()->route('admin.tags.show', $tag->id)->with('message', "$tag->title aggiunto con successo!")->with('type', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        return view('admin.tags.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('admin.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'label' => 'required|string|unique:tags|min:2|max:20',
            'color' => 'string|nullable|min:3',
            'color' => 'unique:tags'
        ], [
            'required' => 'Il campo :attribute è obbligatorio.',
            'label.unique' => "$request->label esiste già.",
            'min' => 'Nome troppo corto.',
            'max' => 'Nome troppo lungo.',
            'color.unique' => 'Il colore esiste già'
        ]);

        $data = $request->all();
        $tag->update($data);

        return redirect()->route('admin.tags.show', $tag->id)->with('message', "$tag->label aggiornato con successo!")->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('admin.tags.index')->with('message', "$tag->label eliminato con successo!")->with('type', 'danger');
    }

    /**
     * Remove all resources from storage.
     *
     * 
     * @return \Illuminate\Http\Response
     */
    public function destroyAll(Request $request)
    {
        $request->validate([
            'tag_id' => 'nullable|exists:categories,id'
        ]);

        $num_tag = Tag::count();
        DB::table('tags')->delete();

        return redirect()->route('admin.tags.index')->with('message', "$num_tag categorie eliminate con successo!")->with('type', 'success');
    }

    /**
     * shows a list of related posts for the given category
     *
     * @param Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function posts(Tag $tag)
    {
        return view('admin.tags.posts', compact('tag'));
    }
}
