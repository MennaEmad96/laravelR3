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
        $pwd = $r->pwd;
        //$remember = $r->$remember;
        //echo $remember;

        echo 'Email is: ' . $email . '<br>' . 'Password is: ' . $pwd . '<br>';
        //return array($email,$pwd);
    }    
}
