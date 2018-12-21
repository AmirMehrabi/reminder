<?php

namespace App\Http\Controllers\Auth;

use App\AuthenticatesUser;
use App\Http\Controllers\Controller;
use App\LoginToken;

class LoginController extends Controller
{

  public function __construct(AuthenticatesUser $auth)
  {
    $this->auth = $auth;
  }

  public function login(){
    return view('auth.login');
  }

  public function postLogin(){

    $this->auth->invite();

    return 'Sweet - go check that email, yo!';

  }

  public function authenticate(LoginToken $token)
  {
    $this->auth->login($token);

    return 'You are now signed in' . auth()->user()->name;
  }
}
