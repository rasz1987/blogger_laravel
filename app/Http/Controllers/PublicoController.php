<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicoController extends Controller
{
    public function index(){
        return view('pages.create');
    }

    public function login(){
        return view('pages.login');
    }
}
