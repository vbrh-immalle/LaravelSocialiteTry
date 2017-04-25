<?php

namespace App\Http\Controllers\OAuth;

use Socialite;
use App\Http\Controllers\Controller;
use Datetime;

class GitHubLoginController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('github')->user();

        // Try to guess OAuth details
        $oauthstate = "unknown";

        // Both OAuth1 and OAuth2 have a token
        $token = $user->token;

        // OAuth2 providers
        $refreshToken = null;
        if( isset($user->refreshToken) ) {
            $refreshToken = $user->refreshToken; // not always provided
        }

        $expiresIn = null;
        if( isset($user->expiresIn) ) {
            $oauthstate = "probably OAuth2";
            $expiresIn = $user->expiresIn;
        }

        // OAuth1 Providers
        $tokenSecret = null;
        if( isset($user->$tokenSecret) ) {
            $oauthstate = "probably OAuth1";
            $tokenSecret = $user->tokenSecret;
        }

        // Return ALL information
        return [
            "id" => $user->getId(),
            "nickname" => $user->getNickname(),
            "name" => $user->getName(),
            "email" => $user->getEmail(),
            "avatar" => $user->getAvatar(),
            "oauthstate" => $oauthstate,
            "oauthtime" => new DateTime,
            "refreshToken" => $refreshToken,
            "expiresIn" => $expiresIn,
            "tokenSecret" => $tokenSecret,
        ];
    }
}