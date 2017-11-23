<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Address;
use App\Company;

class CustomersController extends Controller
{
    public function index() {
        return response()->json(Customer::all());
    }

    public function onlyOne($id) {
        $customer = Customer::find($id);
        if(is_object($customer)) {
            return response()->json(Customer::find($id));
        } else {
            return response()->json(["message" => "Customer not found"], 404);
        }
    }

    public function onlyOneAndAdress($customer_id) {
        $address = Address::find($customer_id);
        if(is_object($address)) {
            return response()->json(address::find($customer_id)->where('customer_id', $customer_id)->get());
        } else {
            return response()->json(["message" => "Customer not found"], 404);
        }
    }

    public function customersByCompany($company_id) {
        $customerCompany = Customer::find($company_id);
        if(is_object($customerCompany)) {
            return response()->json(customer::find($company_id)->where('company_id', $company_id)->get());
        } else {
            return response()->json(["message" => "Company not found"], 404);
        }
    }
}