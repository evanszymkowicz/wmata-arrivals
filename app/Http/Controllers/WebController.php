<?php

namespace App\Http\Controllers;

use Httpful\Request;

class WebController extends Controller
{
    public function index()
    {
        return view('views/app');
    }
}
