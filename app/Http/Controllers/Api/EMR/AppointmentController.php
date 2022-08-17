<?php

namespace App\Http\Controllers\Api\EMR;

use App\Http\Controllers\Controller;
use App\Models\EMR\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        return response()->json([
            'appointments' => Appointment::where('patient_id', auth('api')->id())->with('service')->orderBy('date', 'ASC')->paginate(10),
        ]);
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return response()->json([
            'appointment' => Appointment::find($id)->with(['service', 'front_officer', 'medical_officer', 'radiologist'])->first(),
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
