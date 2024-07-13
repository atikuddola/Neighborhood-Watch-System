<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        return User::all();
    }

    public function store(Request $request){}
}
