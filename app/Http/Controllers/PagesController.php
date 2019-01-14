<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Birthday;
use Auth;
use Kavenegar;

class PagesController extends Controller
{
  public function index()
  {
    $user = Auth::user();
    if ($user) {
      $birthdays = Birthday::where('user_id', $user->id)->get();
    }
    else {
      $birthdays = [];
    }

    foreach ($birthdays as $birthday) {
      $birthday->remaining = $birthday->countdays($birthday->birthday_date);
      $birthday->percent = round($birthday->remaining / 365 * 100) ;
    }

      $today_date = jdate()->format('%d %B %Y');
      $today_time = jdate()->format('H:i');

      return view('index', compact('birthdays', 'today_date', 'today_time'));
  }

  public function sms(){
    try{
        $sender = "10004346";
        $message = "تست ارسال اس ام اس از لاراول";
        $receptor = array("09361103966");
        $result = Kavenegar::Send($sender,$receptor,$message);
        if($result){
            foreach($result as $r){
                echo "messageid = $r->messageid";
                echo "message = $r->message";
                echo "status = $r->status";
                echo "statustext = $r->statustext";
                echo "sender = $r->sender";
                echo "receptor = $r->receptor";
                echo "date = $r->date";
                echo "cost = $r->cost";
            }
        }
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


  public function profile(){
    $user = Auth::user();
    $birthdays = Birthday::where('user_id', $user->id)->get();
    foreach ($birthdays as $birthday) {
      $birthday->remaining = $birthday->countdays($birthday->birthday_date);
      $birthday->percent = round($birthday->remaining / 365 * 100) ;
    }

      $today_date = jdate()->format('%d %B %Y');
      $today_time = jdate()->format('H:i');
      return view('profile', compact('birthdays', 'today_date', 'today_time'));
  }
}
