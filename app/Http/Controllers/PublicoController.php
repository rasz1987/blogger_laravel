<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicoController extends Controller
{
    public function index(){
        $title = 'Welcome to laravel';
        return view('pages.index', compact('title'));
    }
}
