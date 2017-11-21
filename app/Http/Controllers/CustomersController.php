<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
class CustomersController extends Controller
{
    public function index() {
        return response()->json(Customer::all());
    }

    public function onlyOne() {
        $id = collect(request()->segments())->last();
        return response()->json(Customer::find($id));
    }
}
