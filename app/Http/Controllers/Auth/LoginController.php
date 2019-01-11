<?php

namespace App\Http\Controllers\Auth;

use App\AuthenticatesUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LoginToken;
use Auth;

class LoginController extends Controller
{

  public function __construct(AuthenticatesUser $auth)
  {
    $this->auth = $auth;

  }

  public function login(){
    $today_date = jdate()->format('%d %B %Y');
    $today_time = jdate()->format('H:i');
    return view('auth.login', compact('today_time', 'today_date'));
  }

  public function postLogin(){

    $this->auth->invite();
    $today_date = jdate()->format('%d %B %Y');
    $today_time = jdate()->format('H:i');
    $token = '';
    return view('auth.confirm', compact('today_time', 'today_date', 'token'));

  }

  public function authenticate(Request $request)
  {
    $token = LoginToken::where('token', $request->input('token'))->firstOrFail();
    $this->auth->login($token);

    return redirect('/');
  }

  public function logout()
  {
    Auth::logout();

    return redirect('/');
  }
}
