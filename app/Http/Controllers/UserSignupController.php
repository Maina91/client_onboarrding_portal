<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserSignupController extends Controller
{
    public function register()
    {
        return view('Signup.page1');
    }
    public function biodata()
    {
        return view('Signup.page2');
    }
    public function finalize()
    {
        return view('Signup.page3');
    }
    public function payment()
    {
        return view('Signup.page4');
    }
}