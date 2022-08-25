<?php

namespace App\Http\Controllers\Api\EMR;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EMR\Payment;

class PaymentController extends Controller
{
    public function index()
    {
        return response()->json([
            'payments' => Payment::where('patient_id', auth('api')->id())->with('service')->orderBy('date', 'DESC')->paginate(10),
        ]);
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return response()->json([
            'payment' => Payment::where('id', $id)->with(['service', 'patient'])->orderBy('date', 'DESC')->first(),
        ]);
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
