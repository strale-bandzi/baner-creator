<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BanerController extends Controller
{

    public function index()
    {
        return view('welcome');
    }
    public function deliver()
    {

    }

    public function grab()
    {
        return 1;
    }

}
