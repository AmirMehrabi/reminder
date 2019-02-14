<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Birthday;
use Carbon\Carbon;
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


  public function birthdays(Request $request){
    $birthdays = Birthday::where('user_id', $request->ID)->get();

    foreach ($birthdays as $birthday) {
        $birthday->remaining = $birthday->countdays($birthday->birthday_date);
        $birthday->percent = round($birthday->remaining / 365 * 100) ;
      }
    return $birthdays;
  }
}
