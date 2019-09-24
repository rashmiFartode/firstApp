<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Customer;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeNewUserMail;
use App\Events\NewCustomerHasRegisteredEvent;
use Intervention\Image\Facades\Image;
class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activeCustomer = Customer::active()->get();
        $inactiveCustomer = Customer::inactive()->get();
        $companies = Company::all();
        $customers = Customer::latest()->paginate(5);
        return view('customers.index', compact('activeCustomer','inactiveCustomer','customers','companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();//fetching data from company 
        $customer= new Customer;
        return view('customers.create',compact('companies', 'customer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer= Customer::create($this->validateRequest());

        $this->storeImage($customer);
        
        return redirect()->route('customers.index')
                ->with('success','Added new customer');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
         //$customer= Customer::find($customer);
         return view('customers.show', compact('customer'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
         $companies = Company::all();

        $this->storeImage($customer);

        return view('customers.edit', compact('customer','companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $customer->update($this->validateRequest());
        $this->storeImage($customer);
        
        return redirect()->route('customers.index')
                        ->with('success','customer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
  
        return redirect()->route('customers.index')
                        ->with('success','customer deleted successfully');
    }

    private function validateRequest()
    {
        return request()->validate([

            'name'=> 'required|min:3',
            'email'=> 'required|email',
            'mobile'=> 'required|min:10|max:10',
            'status'=> 'required',
            'company_id'=> 'required',
            'image' => 'sometimes|file|image|max:5000',

        ]);
    }

    private function storeImage($customer)
    {
        if(request()->has('image'))
        {
            $customer->update([
                'image' => request()->file('image')->store('storage/uploads', 'public'),
            ]);

            $image= Image::make(public_path('storage/'. $customer->image))->fit(300,300);
            $image->save();
        }
    }
}
