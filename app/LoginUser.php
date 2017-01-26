<?php
namespace MusicChallenge;

use Exception;
use Socialite;
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
            $user = User::firstOrNew(['email' => $oauthUserInfo->getEmail()]);
            $user->name = $oauthUserInfo->getName();
            $user->save();

            auth()->login($user);

        } catch (Exception $e) {
            throw new SocialAuthException(
                sprintf('No fue posible iniciar sesión con %s', ucfirst($providerName))
            );
        }
    }
}