<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Catogry;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Catogry::get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $validated = $request->validated();
        $category = Catogry::create([
            'name' => $validated['name'],
            'parent'=>$validated['parent'],
        ]) ;
        return response()->json([
            'category' =>$category
        ]);
       }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Catogry::findOrFail($id);
        return $category ;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {
        $validated = $request->validated();
        $category = Catogry::findOrFail($id);
        $category1 = $category->update([
            'name' => $validated['name'],
            'parent'=>$validated['parent'],
        ]) ;
        return response()->json([
            'category' =>$category1
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Catogry::findOrFail($id);
        $category->delete();
        return response()->json([
            'msg' => 'done',
        ]);
    }
}
