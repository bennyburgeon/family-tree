<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\Customer;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index(){

    return view('dashboard');

    }
    public function create()
    {
        return view('customer.add');
    }
    public function store(Request $request)
    {
           $request->validate([
                'name'=>'required',
                'email'=> 'required|email|unique:customers,email',
                'mobile'=> 'required|numeric|digits_between:8,13|unique:customers,mobile'
            ]);
            
            $customer = new Customer([
                'name' => request('name'),
                'email'=> request('email'),
                'mobile'=> request('mobile'),
                'created_by'=> auth()->guard('admin')->user()->user_id
            ]);
            $customer->save();
            return redirect('customers')->with('success', 'Customer has been added');
    }
    public function edit($id)
    {
        $customer = Customer::find(decrypt($id));
        return view('customer.edit',compact('customer'));
    }
    public function update(Request $request, $id)
    {
        
        $request->validate([
            'name'=>'required',
            'email' => 'required|email|unique:customers,email,'.$id.',customer_id',
            'mobile' => 'required|numeric|digits_between:8,13|unique:customers,mobile,'.$id.',customer_id'
        ]);
        $customer = Customer::find($id);
        $customer->name =request('name');
        $customer->email =request('email');
        $customer->mobile= request('mobile');
        if(request('status')){
            $status=1;
        }else{
            $status=0;
        }
        $customer->status =$status;
        $customer->updated_by =auth()->guard('admin')->user()->user_id;
        $customer->save();
        return redirect('customers')->with('success', 'Customer has been Updated');
    }
}
