<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('created_at', 'DESC')->get();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = new Category();
        return view('admin.categories.create', compact('category'));
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
            'label' => 'required|string|unique:categories|min:2|max:20',
            'color' => 'string|nullable|min:3'
        ], [
            'required' => 'Il campo :attribute è obbligatorio.',
            'label.unique' => "$request->label esiste già.",
            'min' => 'Nome troppo corto.',
            'max' => 'Nome troppo lungo.'
        ]);

        $data = $request->all();
        $category = new Category();

        $category->fill($data);
        $category->save();

        return redirect()->route('admin.categories.show', $category->id)->with('message', "$category->label aggiunto con successo!")->with('type', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'label' => ['required', 'string', Rule::unique('categories')->ignore($category->id), 'min:2', 'max:20'],
            'color' => 'string|nullable|min:3'
        ], [
            'required' => 'Il campo :attribute è obbligatorio.',
            'label.unique' => "$request->label esiste già.",
            'min' => 'Nome troppo corto.',
            'max' => 'Nome troppo lungo.'
        ]);

        $data = $request->all();
        $category->update($data);

        return redirect()->route('admin.categories.show', $category->id)->with('message', "$category->label aggiornato con successo!")->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('message', "$category->label eliminato con successo!")->with('type', 'danger');
    }

    /**
     * Remove all resource from storage.
     *
     * @param  
     * @return \Illuminate\Http\Response
     */
    public function truncate()
    {
        // TODO: chiedere a marco

        return redirect()->route('admin.categories.index')->with('message', "Tutte le categorie sono state eliminate con successo!")->with('type', 'danger');
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
            'category_id' => 'nullable|exists:categories,id'
        ]);

        $num_cat = Category::count();
        DB::table('categories')->delete();

        return redirect()->route('admin.categories.index')->with('message', "$num_cat categorie eliminate con successo!")->with('type', 'success');
    }

    /**
     * shows a list of related posts for the given category
     *
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function posts(Category $category)
    {
        return view('admin.categories.posts', compact('category'));
    }
}
