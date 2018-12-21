<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoginToken extends Model
{
    public function generateFor(User $user)
    {
      return static::create([
        'user_id' => $user->id,
        'token' => str_random(50)
      ]);
    }
}
