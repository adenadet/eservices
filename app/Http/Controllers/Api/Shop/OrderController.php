<?php

namespace App\Http\Controllers\Api\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Shop\Product;
use App\Models\Shop\Order;
use App\Models\Inventory\Sale;

class OrderController extends Controller
{
    public function index()
    {
        //
    }

    public function mine()
    {
        $orders = Sale::where('customer_id', '=', auth('api')->id())->with('sales_items')->paginate(20);

        return response()->json([
            'orders' => $orders,
        ],200);
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $orders = Sale::where('customer_id', '=', auth('api')->id())->where('id', '=', $id)->with(['sales_items.product.images', 'customer'])->first();

        return response()->json([
            'orders' => $orders,
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
