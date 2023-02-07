<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function pagesRedirect()
    {
        if (Auth::user()) {
            return view('welcome');
        }else {
            return view('auth/login');
        }
    }
}
