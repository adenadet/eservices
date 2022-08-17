<?php

namespace App\Http\Controllers\Api\Finance;

use App\Http\Controllers\Controller;
use App\Models\Finance\Payment;
use App\Models\Finance\TopUp;
use App\Models\Finance\Wallet;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    public function index()
    {
        $balance = Wallet::select('id', 'balance')->where('user_id', '=', auth('api')->id())->first();
        echo $balance;
        return response()->json([
            'balance' => $balance,
            //'topup_cnt' => is_null($balance) ? TopUp::where('user_id', '=', auth('api')->id())->where('wallet_id', '=', $balance->id)->sum('amount'): 0.00,
            //'payment_cnt' => is_null($balance) ? Payment::where('user_id', '=', auth('api')->id())->where('wallet_id', '=', $balance->id)->sum('item_total'): 0.00,
        ]);
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
