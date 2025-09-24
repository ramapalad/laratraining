<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia('Category/Index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $validatedData = $request->validated();

        $category = Category::create($validatedData);

        return response()->json([
            'message' => 'Category created successfully', 
            'category' => $category
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $category = Category::findorFail($category->id);

        if (!$category) {
            return redirect()->back()->with('error', 'Category not found.');
        }
        
        return response()->json($category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $validatedData = $request->validated();

        $category->update($validatedData);

        return response()->json([
            'message' => 'Category updated successfully', 
            'category' => $category->fresh()
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try {
            $category = Category::findOrFail($category->id);
            $category->delete();

            return response()->json(['message' => 'Category deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error deleting category: ' . $e->getMessage()], 500);
        }
    }
}
