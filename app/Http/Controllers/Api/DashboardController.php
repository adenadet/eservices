<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Models\Finance\Wallet;
use App\Models\Inventory\Sale;
use App\Models\Shop\Order;
use App\Models\Shop\ProductReview;
use App\Models\Shop\WishlistItem;
use App\Models\Ticket;
use App\Models\User;

use Carbon\Carbon;

class DashboardController extends Controller
{
    public function admin()
    {
        return response()->json([
            'balance' => Wallet::select('id', 'balance')->where('user_id', '=', auth('api')->id())->first(),
        ]);
    }

    public function customer()
    {
        return response()->json([
            'wallet' => Wallet::select('id', 'balance')->where('user_id', '=', auth('api')->id())->first(),
            'tickets' => Ticket::where('user_id', '=', auth('api')->id())->paginate(5),
            'orders'  => Sale::where('customer_id', '=', auth('api')->id())->latest()->paginate(10),
            'reviews' => ProductReview::where('user_id', '=', auth('api')->id())->latest()->get(),
            'wishlist' => WishlistItem::where('user_id', '=', auth('api')->id())->with(['product.images'])->get(),
             
        ]);
    }

    public function patient()
    {
        return response()->json([
            'balance' => Wallet::select('id', 'balance')->where('user_id', '=', auth('api')->id())->first(),
        ]);
    }
}
