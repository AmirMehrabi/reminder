<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Birthday;

class PagesController extends Controller
{
  public function index()
  {
    $birthdays = Birthday::where('user_id', 1)->get();
    foreach ($birthdays as $birthday) {
      $birthday->remaining = $birthday->countdays($birthday->birthday_date);
      $birthday->percent = round($birthday->remaining / 365 * 100) ;
    }

      $today_date = jdate()->format('%d %B %Y');
      $today_time = jdate()->format('H:i');
      return view('index', compact('birthdays', 'today_date', 'today_time'));
  }
}
