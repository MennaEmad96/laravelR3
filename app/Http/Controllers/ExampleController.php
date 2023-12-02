<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    //create methods that returns a view or words
    public function show(){
        return "My First Controller";
    }

    public function showData(Request $r){
        $email = $r->email;
        return with('email', $email);
        
    }
}
