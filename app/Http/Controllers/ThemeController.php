<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Abraham\TwitterOAuth\TwitterOAuth;
use App\Theme;

class ThemeController extends Controller
{
    public function index(Request $request){
        $themes = Theme::all();
        return view('themes.index', compact('themes'));
    }

    public function  detail(Request $request, $theme_id) {
        $theme = Theme::where('id', $theme_id)->firstOrFail();
        return view('themes.detail', compact('theme'));
    }

    public function create(Request $request) {
        $this->validate($request, [
            'content' => 'required|max:255',
        ]);
        $request->user()->themes()->create([
            'content' => $request->content
        ]);
        $connection = new TwitterOAuth(
            config('const.TWITTER_APP.id'), // Information about your twitter API
            config('const.TWITTER_APP.secret'), // Information about your twitter API
            $request->user()->twitter_token, // You get token from user, when him  sigin to your app by twitter api
            $request->user()->twitter_token_secret// You get tokenSecret from user, when him  sigin to your app by twitter api
        );

        return redirect('/mypage');
    }
    //
}
