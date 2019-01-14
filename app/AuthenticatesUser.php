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
      'phone' => 'required'
    ]);

    return $this;
  }

  protected function createToken()
  {
    $user = User::byPhone($this->request->phone);
    if ($user == null) {
      $user = User::create([
          'name' => '',
          'phone' => $this->request->phone,
      ]);
    }
    return LoginToken::generateFor($user);
  }

}
