<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Models\CustomerCategory;
use Illuminate\Http\Request;
use Carbon\Carbon;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lists = Customer::whereNull('deleted_at');
        if(request('search_keyword')){
            $search=request('search_keyword');
            $lists = $lists->where(function($query) use($search){
                            $query->orWhere('name','LIKE','%'.$search.'%')
                                    ->orWhere('email','LIKE','%'.$search.'%')
                                    ->orWhere('mobile','LIKE','%'.$search.'%');
                                });
        }
        $listsCount =$lists->count();
        $lists =$lists->orderBy('customer_id', 'DESC')->paginate(15);
        return view('customer.list',compact('lists','listsCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = CustomerCategory::where('status',1)->get();
        return view('customer.add',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
           $request->validate([
                'firstname'=>'required',
                'lastname'=>'required',
                'email'=> 'required|email|unique:customers,email',
                'mobile'=> 'required|numeric|digits_between:8,13|unique:customers,mobile'
            ]);
            
            $customer = new Customer([
                'firstname' => request('firstname'),
                'lastname' => request('lastname'),
                'email'=> request('email'),
                'username'=> request('email'),
                'dob'=> request('dob'),
                'gender'=> request('gender'),
                'address'=> request('address'),
                'password'=> app('hash')->make(request('mobile')),
                'mobile'=> request('mobile'),
                'created_by_admin'=> auth()->guard('admin')->user()->user_id
            ]);
            $customer->save();
            return redirect('customers')->with('success', 'Customer has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find(decrypt($id));
        $categories = CustomerCategory::where('status',1)->get();
        return view('customer.edit',compact('customer','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $request->validate([
            'firstname'=>'required',
            'lastname'=>'required',
            'email' => 'required|email|unique:customers,email,'.$id.',customer_id',
            'mobile' => 'required|numeric|digits_between:8,13|unique:customers,mobile,'.$id.',customer_id'
        ]);
        $customer = Customer::find($id);
        $customer->firstname =request('firstname');
        $customer->lastname =request('lastname');
        $customer->email =request('email');
        $customer->mobile= request('mobile');
        $customer->gender= request('gender');
        $customer->dob= request('dob');
        $customer->address= request('address');
        if(request('status')){
            $status=1;
        }else{
            $status=0;
        }
        $customer->status =$status;
        //$customer->updated_by =auth()->guard('admin')->user()->user_id;
        $customer->save();
        return redirect('customers')->with('success', 'Customer has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete
        $customer = Customer::find(decrypt($id));
        $customer->forceDelete();

        // redirect
        return redirect('customers')->with('success', 'Customer has been Deleted');
    }
}
