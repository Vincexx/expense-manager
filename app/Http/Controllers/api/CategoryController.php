<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use Exception;

class CategoryController extends Controller
{
    public function list() {
        try {
            $categories = Category::latest()->get();
            return response()->json([
                'message' => 'Fetch Successful!',
                'data' => $categories
            ], 200);
        } catch(Exception $e) {
            return response()->json([
                'errors' => 'Categories not found!'
            ], 500);
        }
    }

    public function store(StoreRequest $request) {
        try {
            $category = Category::create($request->only('name', 'description'));
            return response()->json([
                'message' => 'Category has been added.'
            ], 201);
        } catch(Exception $e) {
            return response()->json([
                'errors' =>  'There is something wrong with our end. Contact us to fix it.'
            ], 500);
        }
    }

    public function update(UpdateRequest $request, Category $category) {
        try {
            $category->update($request->only('name', 'description'));
            return response()->json([
                'message' => 'Category has been updated.'
            ], 200);
        } catch(Exception $e) {
            return response()->json([
                'errors' =>  'There is something wrong with our end. Contact us to fix it.'
            ], 500);
        }
    }

    public function destroy(Category $category) {
        try {
            $category->delete();
            return response()->json([
                'message' => 'Category has been deleted.'
            ], 200);
        } catch(Exception $e) {
            return response()->json([
                'errors' =>  'There is something wrong with our end. Contact us to fix it.'
            ], 500);
        }
    }
}
