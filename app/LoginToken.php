<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Mail;
use Kavenegar;

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
      try{
          $sender = "10004346";
          $message = " کد ورود شما" . $this->token . " میباشد";
          $receptor = $this->user->phone;
          $result = Kavenegar::Send($sender,$receptor,$message);
      }
      catch(\Kavenegar\Exceptions\ApiException $e){
          // در صورتی که خروجی وب سرویس 200 نباشد این خطا رخ می دهد
          echo $e->errorMessage();
      }
      catch(\Kavenegar\Exceptions\HttpException $e){
          // در زمانی که مشکلی در برقرای ارتباط با وب سرویس وجود داشته باشد این خطا رخ می دهد
          echo $e->errorMessage();
      }

    }

    public function user()
    {
      return $this->belongsTo(User::class);
    }
}
