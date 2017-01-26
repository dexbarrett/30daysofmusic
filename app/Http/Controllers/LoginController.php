<?php

namespace MusicChallenge\Http\Controllers;

use Illuminate\Http\Request;
use MusicChallenge\Exceptions\SocialAuthException;
use MusicChallenge\LoginUser;

class LoginController extends Controller
{
    private $loginUser;

    public function __construct(LoginUser $loginUser)
    {
        $this->loginUser = $loginUser;
    }

    public function auth($providerName)
    {
        return $this->loginUser->authenticate($providerName);
    }

    public function login($providerName)
    {
        try {
            $this->loginUser->login($providerName);
            return redirect()->action('UserController@showDashboard');
        } catch (SocialAuthException $e) {
            return redirect()->action('LoginController@showLoginPage')
                             ->with('message', $e->getMessage())
                             ->with('message-type', 'danger');
        }
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->to('/');
    }

    public function showLoginPage()
    {
        return view('home');
    }
}
