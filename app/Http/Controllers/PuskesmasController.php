<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class PuskesmasController extends Controller
{
    public function index()
    {
        
        return view('puskesmas.index');
    }
}
