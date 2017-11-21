<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

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
        }$customer = Customer::find($id);
    }
}