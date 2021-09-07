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
        $categories = Category::all(['id','title','description']);
        return response()->json($categories);
    }

    /**
     * Store a newly created resource in storages
     */
    public function store(Request $request)
    {
        $category = Category::create($request->post());
        return response()->json([
            'message'=>'Category Created Successfully!!',
            'category'=>$category
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return response()->json($category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $category->fill($request->post())->save();
        return response()->json([
            'message'=>'Category Updated Successfully!!',
            'category'=>$category
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json([
            'message'=>'Category Deleted Successfully!!'
        ]);
    }
}
