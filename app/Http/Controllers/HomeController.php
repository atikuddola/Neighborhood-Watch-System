<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function homepage(){
        return view('home.homepage');
    }

    public function dashboard(){
        return view('dashboard.dashboard');
    }

    public function login(){
        return view('login.loginpage');
    }

    
    
}
