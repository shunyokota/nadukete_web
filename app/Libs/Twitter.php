<?php
/**
 * Created by PhpStorm.
 * User: shun
 * Date: 2018/11/10
 * Time: 10:06
 */

namespace App\Libs;

use Abraham\TwitterOAuth\TwitterOAuth;
use App\User;

class Twitter
{
    public static function post($tweetContent, User $user) {
        $connection = new TwitterOAuth(
            config('const.TWITTER_APP.id'), // Information about your twitter API
            config('const.TWITTER_APP.secret'), // Information about your twitter API
            $user->twitter_token, // You get token from user, when him  sigin to your app by twitter api
            $user->twitter_token_secret// You get tokenSecret from user, when him  sigin to your app by twitter api
        );
        $tweetContent = $tweetContent."\n".'#なづけて';
        return $connection->post("statuses/update", ["status" => $tweetContent]);
    }
}