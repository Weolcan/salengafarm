<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('name')->get();
        return response()->json($categories);
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'icon' => 'nullable|image|max:2048',
            ]);

            $slug = Str::slug($validated['name']);
            $existing = Category::where('slug', $slug)->first();
            if ($existing) {
                return response()->json([
                    'message' => 'Category already exists',
                    'category' => $existing
                ], 200);
            }

            $category = new Category([
                'name' => $validated['name'],
                'slug' => $slug,
            ]);

            if ($request->hasFile('icon')) {
                $path = $request->file('icon')->store('category-icons', 'public');
                $category->icon_path = $path;
            }

            $category->save();

            return response()->json([
                'message' => 'Category created',
                'category' => $category
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Validation error',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Error creating category: '.$e->getMessage());
            return response()->json([
                'message' => 'Error creating category',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy(Category $category)
    {
        try {
            // Prevent deleting base categories
            $base = ['shrub','herbs','palm','tree','grass','bamboo','fertilizer'];
            if (in_array($category->slug, $base, true)) {
                return response()->json([
                    'message' => 'Base categories cannot be deleted.'
                ], 403);
            }
            if ($category->icon_path) {
                Storage::disk('public')->delete($category->icon_path);
            }
            $category->delete();
            return response()->json(['message' => 'Category deleted']);
        } catch (\Exception $e) {
            Log::error('Error deleting category: '.$e->getMessage());
            return response()->json([
                'message' => 'Error deleting category',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
