<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Mail;
use Kavenegar;
use Redirect;

class LoginToken extends Model
{

   protected $fillable = ['user_id', 'token'];

   public function getRouteKeyName()
   {
     return 'token';
   }


    public static function generateFor(User $user)
    {
      return static::create([
        'user_id' => $user->id,
        'token' => str_random(5)
      ]);
    }

    public function send(){



    }

    public function user()
    {
      return $this->belongsTo(User::class);
    }
}
