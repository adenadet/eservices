<?php

namespace App\Http\Controllers\Api\Finance;

use App\Http\Controllers\Controller;
use App\Models\Finance\TopUp;
use Illuminate\Http\Request;

class TopUpController extends Controller
{
    public function index()
    {
        return response()->json([
            'topups' => TopUp::where('user_id', '=', auth('api')->id())->orderBy('date', 'ASC')->paginate(5),
            'user' => auth('api')->user(),
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
