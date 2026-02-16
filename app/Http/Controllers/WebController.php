<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class WebController extends controller
{
   public function index()
    {
        return view('index');
    }
    public function catalog()
    {
        return view('catalog');
    }
}
