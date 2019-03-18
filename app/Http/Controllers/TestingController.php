<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Auth\Guard;

use DB;
use Auth;
use DateTime;

use App\Blog;
use App\State;
use App\User;


class BlogController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth', ['except' => ['index', 'show', 'search']]);
    }

    
    // Function index to request information by ajax
    public function index(Request $request)
    {
        
    }
    
    
}
