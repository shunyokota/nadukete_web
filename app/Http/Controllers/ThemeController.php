<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Abraham\TwitterOAuth\TwitterOAuth;

class ThemeController extends Controller
{
    public function index(Request $request){
        return view('themes.index');
    }

    public function create(Request $request) {
        $this->validate($request, [
            'content' => 'required|max:255',
        ]);
        $request->user()->themes()->create([
            'content' => $request->content
        ]);
        var_dump(config('const.TWITTER_APP.id'));
        var_dump(config('const.TWITTER_APP.secret'));
        var_dump($request->user());
        var_dump($request->user()->twitterToken);
        var_dump($request->user()->twitterTokenSecret);
        $connection = new TwitterOAuth(
            config('const.TWITTER_APP.id'), // Information about your twitter API
            config('const.TWITTER_APP.secret'), // Information about your twitter API
            $request->user()->twitter_token, // You get token from user, when him  sigin to your app by twitter api
            $request->user()->twitter_token_secret// You get tokenSecret from user, when him  sigin to your app by twitter api
        );

        $statuses = $connection->post("statuses/update", ["status" => $request->content]);

        return redirect('/mypage');

    }
    //
}
