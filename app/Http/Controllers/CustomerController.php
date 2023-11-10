<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $customers = Customer::query()->where('deleted','=',false)->paginate(10);
        return view('customer.index', compact('customers'));
    }

    public function create()
    {
        return view('customer.create');
    }

    public function store(Request $request)
    {
        $customer = new Customer();
        $customer->name_one = $request->name_one;
        $customer->name_two = $request->name_two;
        $customer->lastname_one = $request->lastname_one;
        $customer->lastname_two = $request->lastname_two;
        $customer->document_identification = $request->document_identification;
        $customer->document_identification_number = $request->document_identification_number;
        $customer->gender = $request->gender;
        $customer->address = $request->address;
        $customer->deleted = false;
        $customer->save();
        
        return redirect()->route('customer.index')->with('alert_message','Se registró el cliente.');
    }

    public function edit(Customer $customer)
    {
        return view('customer.edit', compact('customer'));
    }

    public function update(Customer $customer, Request $request)
    {
        $customer->name_one = $request->name_one;
        $customer->name_two = $request->name_two;
        $customer->lastname_one = $request->lastname_one;
        $customer->lastname_two = $request->lastname_two;
        $customer->document_identification = $request->document_identification;
        $customer->document_identification_number = $request->document_identification_number;
        $customer->gender = $request->gender;
        $customer->address = $request->address;
        $customer->save();
        
        return redirect()->route('customer.index')->with('alert_message','Se actualizó el cliente.');
    }

    public function delete(Customer $customer) 
    {
        return view('customer.delete', compact('customer'));
    }

    public function destroy(Customer $customer)
    {
        $customer->deleted = true;
        $customer->save();

        return redirect()->route('customer.index')->with('alert_message','Se eliminó al cliente.');
    }
}
