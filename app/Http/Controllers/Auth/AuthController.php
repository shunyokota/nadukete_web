<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Socialite;
use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected $redirectPath = '/';
    /**
     * ユーザーをTwitterの認証ページにリダイレクトする
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('twitter')->redirect();
    }
    /**
     * Twitterからユーザー情報を取得する
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('twitter')->user();
        } catch (Exception $e) {
            return redirect('auth/twitter');
        }
        $authUser = $this->findOrCreateUser($user);
        Auth::login($authUser, true);
        return redirect('/');
    }

    public function getLogout() {
        Auth::logout();
        return redirect('/');
    }

    private function findOrCreateUser($twitterUser){
        $authUser = User::where('twitter_id', $twitterUser->id)->first();
        if ($authUser){
            return $authUser;
        }
//        var_dump($twitterUser);
//        exit;
        return User::create([
            'email' => $twitterUser->email,
            'name' => $twitterUser->name,
            'nickname' => $twitterUser->nickname,
            'twitter_id' => $twitterUser->id,
            'avatar' => $twitterUser->avatar_original,
            'description' => $twitterUser->user['description'],
        ]);
    }
}
