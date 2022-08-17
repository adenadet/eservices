<?php

namespace App\Http\Controllers\Api\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Shop\Category;
use App\Models\Shop\Product;

class CategoryController extends Controller
{
    public function index()
    {
        //
    }

    public function store(Request $request)
    {
    }

    public function mega()
    {
        return response()->json([
            'men_categories' => Category::where('parent_id', '=', 1)->with('subs')->inRandomOrder()->limit(4)->get(),
            'women_categories' => Category::where('parent_id', '=', 2)->with('subs')->get(),
            'kids_categories' => Category::where('parent_id', '=', 3)->with('subs')->get(),
        ], 200);
    }

    public function show($id)
    {
        if (is_numeric($id)) {
            $category = Category::where('id', '=', $id)->with('subs')->first();
        } elseif (is_string($id)) {
            $category = Category::where('title', '=', $id)->with('subs')->first();
        } else {
            return response()->json([], 422);
        }
        return response()->json([
            'category' => $category,
            'products' => Product::where('cat_id', '=', $category->id)
                ->orWhere('child_cat_id', '=', $category->id)->inRandomOrder()
                ->with(['images', 'colours.colour', 'category', 'sizes'])->paginate(50),
        ], 200);
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
