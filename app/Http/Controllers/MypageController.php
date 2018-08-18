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
        $themes = $request->user()->themes()->orderBy('id', 'desc')->get();
        return view('mypage.themes', compact('themes'));
    }

    public function namings(Request $request) {
        $namings = $request->user()->namings()->orderBy('id', 'desc')->get();
        return view('mypage.namings', compact('namings'));
    }
}
