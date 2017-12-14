<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Insta_pic;

class InstaController extends Controller
{
    public function index() {
        //return response()->json(Insta_pic::all());

        $insta = Insta_pic::all(); 
        return View('insta/index', ['images' => $insta]);
    }
}
