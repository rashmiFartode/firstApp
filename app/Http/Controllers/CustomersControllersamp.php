<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Customer;
class CustomersControllersamp extends Controller
{
    public function index()
    {
        $activeCustomer = Customer::active()->get(); //scope aassignmnent->look up in Customer model
        $inactiveCustomer = Customer::inactive()->get();
        $companies = Company::all();
    	$customer = Customer::all();
    	//dd($customer); works link print_r
        return view('customers.index', compact('activeCustomer','inactiveCustomer','customer','companies'));
    }

    public function create()
    {
        $companies = Company::all();//fetching data from company 
        return view('customers.create',compact('companies'));
    }

    public function store()
    {
    	$data=request()->validate([
    		'name'=> 'required|min:3',
    		'email'=> 'required|email',
            'mobile'=> 'required|min:10|max:10',
            'status'=> 'required',
            'company_id'=> 'required'
    	]);
        /*================================
        /*passing validated data
        /*this may cause mass assignment error 
        /*look out mass assignment methods in /* 'Custome model'
        /*===============================*/
        Customer::create($data);

        /*=================
        // Instead of writing this lengthy code // you can this single line for clean cotroller code. Code always has 
        //   Customer::create($data);
        //=================
        $customer = new Customer();
    	$customer->name = request('name');
    	$customer->email = request('email');
        $customer->mobile = request('mobile');
        $customer->status = request('status');

    	$customer->save();
        */
    	return redirect()->route('customers.index');
    }
    public function show(Customer $customer)
    {
        $customer= Customer::find($customer);
        // dd($customer);
        return route('customers.show', compact('customer'));
    }
}
