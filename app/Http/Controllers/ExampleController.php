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
    
    public function upload(Request $request){
        //image-->html input tag name attribute
        $file_extension = $request->image->getClientOriginalExtension();
        //form new image name into database
        $file_name = time() . '.' . $file_extension;
        //direction to save new image with the new name
        $path = 'assets/images';
        //save image into laravel images
        $request->image->move($path, $file_name);
        return 'Uploaded';
    }
}
