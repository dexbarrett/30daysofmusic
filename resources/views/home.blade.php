@extends('layouts.master')
@section('page-title', 'Home page')
@section('content')
 <div class="col-md-4 col-md-offset-4 buttons">
    @include('partials.flash-messages')
    <a href="{{ action('LoginController@auth', ['provider' => 'twitter']) }}" class="btn btn-lg btn-block btn-social btn-twitter login-button">
        <span class="fa fa-twitter login-button-icon"></span> iniciar sesión con Twitter
    </a>
</div>
@endsection