<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function index(Request $request){
        return view('themes.index');
    }
    //
}
