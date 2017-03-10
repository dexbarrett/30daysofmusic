<?php
namespace MusicChallenge;

use Exception;
use Socialite;
use MusicChallenge\User;
use MusicChallenge\Credentials;
use MusicChallenge\Exceptions\SocialAuthException;

class LoginUser
{
    public function authenticate($providerName)
    {
        return Socialite::driver($providerName)->redirect();
    }

    public function login($providerName)
    {
        try {

            $oauthUserInfo = Socialite::driver($providerName)->user();
            
            $credentials = Credentials::where('twitter_id', $oauthUserInfo->getId())
                                ->first();

            if (is_null($credentials)) {
                $user = new User;
                $user->name = $oauthUserInfo->getName();
                $user->email = $oauthUserInfo->getEmail();
                $user->save();

                $credentials = new Credentials;
                $credentials->twitter_id = $oauthUserInfo->getId();
                $credentials->user_id = $user->id;
            }

            $credentials->twitter_token = $oauthUserInfo->token;
            $credentials->twitter_token_secret = $oauthUserInfo->tokenSecret;
            $credentials->save();
            
            auth()->login($credentials->user);

        } catch (Exception $e) {
            throw new SocialAuthException(
                sprintf('No fue posible iniciar sesión con %s', ucfirst($providerName))
            );
        }
    }
}