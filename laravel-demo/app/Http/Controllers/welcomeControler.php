<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class welcomeControler extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }
    public function dashboard()
    {
        return view('dashboard');
    }
    public function h_dashboard()
    {
        return view('h_dashboard');

    }
    public function scl_dashboard()
    {
        return view('scl_dashboard');
    }
}
