<?php

namespace App;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Auth;

class AuthenticatesUser
{

  use ValidatesRequests;

  protected $request;


  public function __construct(Request $request)
  {
    $this->request = $request;
  }


  public function invite()
  {
    $this->validateRequest()
   ->createToken()
   ->send();
  }

  public function login(LoginToken $token)
  {
    Auth::login($token->user);
    $token->delete();
  }

  protected function validateRequest()
  {
    $this->validate($this->request, [
      'email' => 'required|email|exists:users'
    ]);

    return $this;
  }

  protected function createToken()
  {
    $user = User::byEmail($this->request->email);

    return LoginToken::generateFor($user);
  }

}
