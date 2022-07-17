<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index()
    {
        return view('home');
    }

    public function home()
    {
        if (Auth::check()) {
            return view('home');
        } else {
            return view('welcome');
        }
    }

}
