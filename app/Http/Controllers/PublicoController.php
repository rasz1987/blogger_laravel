<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicoController extends Controller
{
    public function index(){
        
    }

    public function login(){
        return view('login');
    }
}
