<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Abraham\TwitterOAuth\TwitterOAuth;
use App\Theme;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ThemeController extends Controller
{
    public function index(Request $request){
        $themes = Theme::orderBy('id', 'desc')->get();
        return view('themes.index', compact('themes'));
    }

    public function  detail(Request $request, $theme_id) {
        $theme = Theme::where('id', $theme_id)->firstOrFail();
        return view('themes.detail', compact('theme'));
    }



    public function create(Request $request) {
        if (Auth::check()) {
            $this->validate($request, [
                'content' => 'required|max:255',
            ]);
            $theme = new Theme();
            $theme->content = $request->content;
            $theme->user_id = $request->user()->id;
            $theme->save();
            $connection = new TwitterOAuth(
                config('const.TWITTER_APP.id'), // Information about your twitter API
                config('const.TWITTER_APP.secret'), // Information about your twitter API
                $request->user()->twitter_token, // You get token from user, when him  sigin to your app by twitter api
                $request->user()->twitter_token_secret// You get tokenSecret from user, when him  sigin to your app by twitter api
            );
            $request->session()->flash('message', 'お題を登録しました。');

            $disk = Storage::disk('s3');
            $filePath = public_path().'/images/theme_frame.jpg';
            $font = "/vagrant/font1.otf";
            $image = imagecreatefromjpeg($filePath);
            $color = imagecolorallocate($image, 0, 0, 0);
            $imageName = 'theme_'.$theme->id.'.jpg';

            imagettftext($image, 10, 0, 30, 40, $color, $font, $request->content);
            imagejpeg($image, $imageName, 100);

            // S3 Buketにファイルをアップロード
            $disk->put($imageName, file_get_contents($imageName));

            return redirect('/mypage/themes');
        }
    }
    //
}
