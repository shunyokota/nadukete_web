<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libs\Twitter;
use App\Theme;
use Illuminate\Support\Facades\Auth;

class ThemeController extends Controller
{
    public function index(Request $request){
        //$themes = Theme::orderBy('id', 'desc')->get();
        $themes = Theme::orderBy('id', 'desc')->paginate(10);
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

            $themeUrl = Theme::getThemeUrl($theme->id);
            $tweetContent = $request->content."\n".'この事象に名前をつけてください！'."\n".$themeUrl;
            Twitter::post($tweetContent, $request->user());
            $request->session()->flash('message', 'お題を登録しました。');

            return redirect('/mypage/themes');
        }
    }

    public function cardJpg(Request $request, $theme_id) {

        $theme = Theme::where('id', $theme_id)->firstOrFail();

        //$disk = Storage::disk('s3');
        $filePath = public_path().'/images/theme_frame.jpg';
        $font = "fonts/font.otf";
        $image = imagecreatefromjpeg($filePath);
        $originalWidth = imagesx($image);
        $contentWordWrap = mb_wordwrap($theme->content, 25);
        //exit;
        $ttfBox = imagettfbbox(20, 0, $font, $contentWordWrap);
        $x = ceil(($originalWidth - $ttfBox[2]) / 2);
        $color = imagecolorallocate($image, 0, 0, 0);
        $imageName = 'theme_'.$theme->id.'.jpg';

        imagettftext($image, 20, 0, $x, 200, $color, $font, $contentWordWrap);
        imagejpeg($image, $imageName, 100);

        $response = response()->file($imageName);
        //unlink($imageName);
        return $response;

        // S3 Buketにファイルをアップロード
        //$disk->put($imageName, file_get_contents($imageName));
    }
}



function mb_wordwrap( $str, $width=35, $break=PHP_EOL )
{
    $c = mb_strlen($str);
    $arr = [];
    for ($i=0; $i<=$c; $i+=$width) {
        $arr[] = mb_substr($str, $i, $width);
    }
    return implode($break, $arr);
}
