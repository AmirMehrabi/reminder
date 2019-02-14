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

      $url = url('/auth/token', $this->token);
      Mail::raw(
        "<a href='{$url}'>{$url}</a>",
        function($message) {
          $message->to('aut0run2011@gmail.com')->subject('ورود به یادآورد');
        }
      );
          $sender = "10004346";
          $message = " :کد ورود شما" . $this->token;
          $receptor = $this->user->phone;
          //$result = Kavenegar::Send($sender,$receptor,$message);
    }

    public function user()
    {
      return $this->belongsTo(User::class);
    }
}
