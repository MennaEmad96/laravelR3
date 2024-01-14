<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mail\MailableName;
use Illuminate\Support\Facades\Mail;

use App\Models\Contact;

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

    public function createSession(){
        session()->put('testSession', 'My first session value');
        session()->forget('testSession');
        return 'sesstion created: '.session('testSession');
    }

    public function email(Request $request){
        // return $request;
        $messages=$this->messages();
        $data = $request->validate([
            'name'=>'required|string|max:50',
            'phone'=>'required|string|max:20',
            'email'=>'required|email',
            'subject' => 'required|string|max:100',
            'message' => 'required|string|max:1000',
        ], $messages);
        $data['news'] = isset($request->news);
        $tomail="menna@gmail.com";
        // 'eng_peter_elias@gmail.com'
        //send array '$data' to 'construct' method in 'MailableName' class
        // Mail::to($tomail)->send(new MailableName($data));
        Contact::create($data);
        return back()->with('success','Email sent sucssefully');
    }

    public function messages()
    {
        return [
            'title.required'=>'العنوان مطلوب',
            'title.string'=>'Should be string',
            'description.required'=>'Should be text',
            'image.required'=>'Please be sure to select an image',
            'image.mimes'=>'Incorrect image type',
            'image.max'=>'Max file size exeeced',
            'category_id.exists'=>'Choose category whithin our given categories',
        ];
    }
}
