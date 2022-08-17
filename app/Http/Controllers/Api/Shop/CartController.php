<?php

namespace App\Http\Controllers\Api\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

use App\Models\Shop\Product;
use App\Models\Shop\Cart;
use App\Models\Shop\Wishlist;

class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        $product = Product::where('id', '=', $id)->with('images')->first();
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        //dd($request->session()->get('cart'));
        return response()->json(['cart' => $cart
            ], 200);
    }
    
    public function addToWishlist(Request $request, $id)
    {
        $product = Product::where('id', '=', $id)->with('images')->first();
        $oldWishlist = Session::has('wishlist') ? Session::get('wishlist') : null;
        $wishlist = new Wishlist($oldWishlist);
        $wishlist->add($product, $product->id);

        $request->session()->put('wishlist', $wishlist);
        //dd($request->session()->get('cart'));
        return response()->json([
            'wishlist' => $wishlist
        ], 200);
    }

    public function getCart()
    {
        if(!Session::has('cart')){
            $cart = null;
        }
        else{
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        }
        return response()->json(['cart' => $cart
            ], 200);
    }

    public function getWishlist()
    {
        if(!Session::has('wishlist')){
            $wishlist = null;
        }
        else{
            $oldWishlist = Session::get('wishlist');
            $wishlist = new Cart($oldWishlist);
        }
        return response()->json(['wishlist' => $wishlist
            ], 200);
    }

    public function index()
    {
        if(!Session::has('cart')){
            $cart = null;
        }
        else{
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        }
        return response()->json(['cart', $cart
            ], 200);
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
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
