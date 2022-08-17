<?php

namespace App\Http\Controllers\Api\Finance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Finance\Payment;
use App\Models\Finance\TopUp;

class PaymentController extends Controller
{
    public function index()
    {
        return response()->json([
            'payments' => Payment::where('user_id', '=', auth('api')->id())->orderBy('date', 'ASC')->paginate(5),
        ]);
    }

    public function store(Request $request)
    {

        $payment = Payment::create([]);
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
