<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MypageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
        return view('mypage.index');
    }

    public function themes(Request $request) {
        $themes = $request->user()->themes()->get();
//        var_dump($themes);
//        exit;
        return view('mypage.themes', compact('themes'));
    }
}
