<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function chats()
    {
        return view('home');
    }

    public function dashboard()
    {
        return view('home');
    }

    public function wallet()
    {
        return view('home');
    }
}
