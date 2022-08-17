<?php

namespace App\Http\Controllers\Api\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Inventory\Customer;
use App\Models\Inventory\CustomerContactPerson;

use App\Models\User\Area;
use App\Models\User\State;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::orderBy('display_name', 'ASC')->with('area')->with('state')->paginate(20);
        return response()->json([
            'areas' => Area::all(),
            'customers' => $customers,
            'states' => State::with('areas')->get(), 
        ]);
    }

    public function initials()
    {
        return response()->json([
            'areas' => Area::all(),
            'states' => State::with('areas')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $area = Area::find($request->input('area_id'));
        $states = State::all(); 
        $state_id = $area ? $area->state_id :$states[$request->input('state_id')]->id;
        $customer = Customer::create([
            'customer_type' => $request->input('customer_type'), 
            'company_name'  => $request->input('company_name'), 
            'display_name'  => $request->input('dispaly_name'),  
            'unique_id'     => $request->input('unique_id'), 
            'image'         => $request->input('image'), 
            'street'        => $request->input('street'), 
            'street2'       => $request->input('street2'), 
            'city'          => $request->input('city'), 
            'area_id'       => $request->input('area_id'), 
            'state_id'      => $state_id, 
            'phone'         => $request->input('phone'), 
            'dob'           => $request->input('dob'), 
            'email'         => $request->input('email'), 
            'website'       => $request->input('website'), 
            
            'cp_title'      => $request->input('cp_title'), 
            'cp_first_name' => $request->input('cp_first_name'), 
            'cp_last_name'  => $request->input('cp_last_name'), 
            'cp_phone'      => $request->input('cp_phone'), 
            'cp_email'      => $request->input('cp_email'), 

            'created_by'    => $request->input('created_by'), 
            'created_at'    => $request->input('created_at'), 
            'updated_at'    => $request->input('updated_at'), 
            'updated_by'    => $request->input('updated_by'), 
            'deleted_by'    => $request->input('deleted_by'), 
            'deleted_at'    => $request->input('deleted_at'),

        ]);

        if ((!is_null($request->input('cp_first_name'))) || (!is_null($request->input('cp_last_name')))){
            $contact_person = CustomerContactPerson::create([
                'customer_id'   => $customer->id, 
                'cp_title'      => $request->input('cp_title'), 
                'cp_first_name' => $request->input('cp_first_name'), 
                'cp_last_name'  => $request->input('cp_last_name'), 
                'cp_phone'      => $request->input('cp_phone'), 
                'cp_email'      => $request->input('cp_email'),
            ]);
        }

        $new_customer = Customer::where('id', '=', $customer->id)->with('contact_persons')->first();
        $customers = Customer::latest()->paginate(20);
        return response()->json([
            'areas'     => Area::all(),
            'customer'  => $new_customer,
            'customers' => $customers,
            'states'    => State::with('areas')->get(), 
        ]);
    }

    public function search()
    {
        if ($search = \Request::get('q')){
            $customers = Customer::orderBy('display_name', 'ASC')->where(function($query) use ($search){
                $query->where('cp_first_name', 'LIKE', "%$search%")
                ->orWhere('cp_other_name', 'LIKE', "%$search%")
                ->orWhere('cp_last_name', 'LIKE', "%$search%")
                ->orWhere('display_name', 'LIKE', "%$search%")
                ->orWhere('company_name', 'LIKE', "%$search%")
                ->orWhere('email', 'LIKE', "%$search%")
                ->orWhere('phone', 'LIKE', "%$search%");
                })->paginate(20);
            }
        else{
            $customers = Customer::orderBy('display_name', 'ASC')->paginate(20);
        }
        
        return response()->json(['customers' => $customers,]);
    }

    public function show($id)
    {

        return response()->json([
            'areas'     => Area::all(),
            'customer'  => Customer::where('id', '=', $id)->with('state')->with('contact_persons')->first(),
            'states'    => State::with('areas')->get(), 
        ]);
    }

    public function update(Request $request, $id)
    {
        $area = Area::find($request->input('area_id'));
        $states = State::all(); 

        $state_id = $area ? $area->state_id :$states[$request->input('state_id')]->id; 

        $customer = Customer::find($id);
         
        $customer->customer_type = $request->input('customer_type'); 
        $customer->company_name  = $request->input('company_name'); 
        $customer->display_name  = $request->input('display_name');  
        $customer->unique_id     = $request->input('unique_id'); 
        $customer->image         = $request->input('image'); 
        $customer->street        = $request->input('street'); 
        $customer->street2       = $request->input('street2'); 
        $customer->city          = $request->input('city'); 
        $customer->area_id       = $request->input('area_id'); 
        $customer->state_id      = $state_id;
        $customer->phone         = $request->input('phone'); 
        $customer->dob           = $request->input('dob'); 
        $customer->email         = $request->input('email'); 
        $customer->website       = $request->input('website'); 
        $customer->zip_code      = $request->input('zip_code'); 
            
        $customer->cp_title      = $request->input('cp_title'); 
        $customer->cp_first_name = $request->input('cp_first_name'); 
        $customer->cp_last_name  = $request->input('cp_last_name'); 
        $customer->cp_phone      = $request->input('cp_phone'); 
        $customer->cp_email      = $request->input('cp_email'); 

        $customer->created_by    = $request->input('created_by'); 
        $customer->updated_by    = $request->input('updated_by'); 
        
        $customer->save();
        

        return response()->json([
            'areas'     => Area::all(),
            'customer'  => Customer::where('id', '=', $id)->with('state')->with('contact_persons')->first(),
            'states'    => State::with('areas')->get(), 
        ]);
    }

    public function destroy($id)
    {
        //
    }
}
