<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view("Category.index")->with("categories",$categories);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Category.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            "name" => "required|unique:categories,name|min:3"
        ]);
        // dd($request->all());
        Category::create($request->all());
        // $cate = new Category;
        // $cate->name = $request->input('name');
        return to_route('category.index')->with('success', 'Category created sucessfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        // dd($category->post);
        return view("Category.edit")->with("category",$category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            "name" => "required|min:3|unique:categories,name," . $id
        ]);
        $cate = Category::find($id);
        $cate->name = $request->name;
        $cate->update();
        // dd($cate);
        return to_route('category.index')->with('success', 'Category updated sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cate = Category::find($id);
        $cate->delete;

        return to_route('category.index')->with('success', 'Category deleted sucessfully');
    
    }
}
