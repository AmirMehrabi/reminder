@extends('layouts.master')

@section('title', 'دیگر تاریخ تولد آشنایان را فراموش مکنکن')



@section('body')
  <section class="intro">
    <div class="container">
      <div class="row   justify-content-md-center">
        <div class="col col-md-5 text-center">
          <div class="calc-form">
            @if (session()->has('status'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                تولد مورد نظر شما با موفقت به پروفایلتان افزوده شد.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @endif

            <h1 class="h3 mb-3 font-weight-normal">دیگر تاریخ تولدها را فراموش نکنید</h1>
            {!! Form::open(['route' => 'birthday.store']) !!}
            <div class="input-group input-group-lg ltr pt-4">
              <input type="text" class="form-control no-border rtl main-input" name="name" placeholder="نام و نام خانوادگی متولد">
            </div>
            <div class="input-group input-group-lg ltr pt-4">
              <input type="date" class="form-control no-border ltr main-input" name="birthDate" placeholder="۱۳۷۴ / ۰۶ / ۱۸">
            </div>
            <div class="input-group input-group-lg ltr pt-4">
              {!! Form::submit('ذخیره', ['class' => 'btn btn-lg btn-warning uneditable-input btn-block r-1']); !!}
            </div>
          </div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </section>
  @if (count($birthdays))
    <section class="birthdays">
      <div class="container">
        <div class="row text-center">
          @foreach ($birthdays as $birthday)
            <div class="col-md-4">
              <div class="c100 p{{$birthday->percent }} big green">
                  <span>{{$birthday->countdays($birthday->birthday_date)}} روز</span>
                  <div class="slice">
                      <div class="bar"></div>
                      <div class="fill"></div>
                  </div>
              </div>
              <div class="clearfix">
              </div>
              <p class="h4 pt-3">{{$birthday->name}}</p>
              <p class="h6 text-muted">تاریخ تولد:  {{jdate(\Carbon\Carbon::parse($birthday->birthday_date))->format('Y/m/d')}}</p>
            </div>
          @endforeach

        </div>
      </div>
    </section>
  @endif

@stop
