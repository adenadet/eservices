<?php

namespace App\Http\Controllers\Api\Shop;

use App\Http\Controllers\Controller;
use App\Models\Shop\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return response()->json([
            'products' => Product::where([['status', '=', 'active'],])->with(['colours.colour', 'sizes.size', 'images'])
            ->with(array('photos' => 
            function($query){
                $query->select('source')->orderBy('created_at', 'asc');
            }
            ))->latest()->paginate(10),
        ],200);
    }


    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return response()->json([
            'product' => Product::where([['status', '=', 'active'],['id', '=', $id]])->with(['category', 'child_category', 'colours.colour', 'sizes.size', 'images'])->first(),
        ],200);
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
