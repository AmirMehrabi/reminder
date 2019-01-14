<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Redirect;
use App\Birthday;
use Jalalian;

class BirthdayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
          'name' => 'required',
          'birthday_date' => 'required',
      ]);
        $dateString = \Morilog\Jalali\CalendarUtils::convertNumbers($request->input('birthday_date'), true);
        //$Jalalian = jdate($dateString)->format('date');

        // get instance of \Carbon\Carbon
        $carbon_birth_date = \Morilog\Jalali\CalendarUtils::createCarbonFromFormat('Y/m/d', $dateString);
        $birthday =  new Birthday;
        $birthday->user_id = 1;
        $birthday->name = $request->input('name');
        $birthday->birthday_date = $carbon_birth_date;

        $birthday->save();
        $request->session()->flash('status', 'تولد مورد نظر، با موفقیت به پروفایل شما افزوده شد');
        return Redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $request->validate([
          'name' => 'required',
          'birthday_date' => 'required',
      ]);
      $dateString = \Morilog\Jalali\CalendarUtils::convertNumbers($request->input('birthday_date'), true);
      //$Jalalian = jdate($dateString)->format('date');

      // get instance of \Carbon\Carbon
      $carbon_birth_date = \Morilog\Jalali\CalendarUtils::createCarbonFromFormat('Y/m/d', $dateString);
        $birthday = Birthday::where('id', $id)->firstOrFail();
        $birthday->user_id = 1;
        $birthday->name = $request->input('name');
        $birthday->birthday_date = $carbon_birth_date;

        $birthday->save();
        $request->session()->flash('status', 'تولد مورد نظر، با موفقیت به پروفایل شما افزوده شد');
        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        Birthday::findOrFail($id)->delete();
        $request->session()->flash('status', 'تولد مورد نظر شما با موفقیت حذف شد');
        return Redirect::back();
    }
}
