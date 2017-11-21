<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
class CustomersController extends Controller
{
    public function index() {
        return response()->json(Customer::all());
    }
}
