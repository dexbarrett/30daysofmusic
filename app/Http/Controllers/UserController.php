<?php

namespace MusicChallenge\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showDashboard()
    {
        return view('users.dashboard');
    }
}
