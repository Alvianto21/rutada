<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    //home page
    public function index () {
        return view('index', ['title' => 'Home Page']);
    }

    //contact page
    public function contact () {
        return view('contact', ['title' => 'Contact Us']);
    }
}
