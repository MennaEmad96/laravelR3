<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view("index");
    }
    public function __invoke()
    {
        return view('404');
    }
    public function blog()
    {
        return view("blog-single");
    }
    public function contact()
    {
        return view("contact");
    }
    public function portfolio()
    {
        return view("portfolio-details");
    }
}