<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\StoreCategory;
use App\Http\Requests\UpdateCategory;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Categories';
        $categories = Category::orderBy('created_at', 'desc')->paginate(9);
        return view('category.index', compact(['categories', 'title']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create New Category';
        return view('category.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategory $request)
    {
        $category = new Category;
        $category->name = $request->name;
        if ($request->hasFile('cover')) {
            $path = $request->cover->storeAs("public/categories", Str::slug($request->name) . '.' . $request->cover->extension());
            if ($request->cover->isValid())
                $category->cover = $path;
        }

        $category->save();

        return back()->with('message', 'Successful!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        // TODO
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $title = 'Edit Category';
        return view('category.edit', compact(['category', 'title']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategory $request, Category $category)
    {
        $category->name = $request->name;
        if ($request->hasFile('cover')) {
            $path = $request->cover->storeAs("public/categories", Str::slug($request->name) . '.' . $request->cover->extension());
            if ($request->cover->isValid())
                $category->cover = $path;
        }

        $category->save();

        return back()->with('message', 'Successful!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('message', 'Successful!');
    }
}
