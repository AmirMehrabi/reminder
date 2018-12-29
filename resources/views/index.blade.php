<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>متولد | تاریخ تولد آشنایان را فراموش نکن</title>

    <link rel="stylesheet" href="{{URL::asset('css/fonts/fonts.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/circle.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/master.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">


  </head>

  <body class="text-center">


    <nav class="navbar navbar-expand-lg  navbar-light bg-warning">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto pr-0">
          <div class="inset">
            <img src="https://ctvalleybrewing.com/wp-content/uploads/2017/04/avatar-placeholder.png">
          </div>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              پروفایل من
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">پروفایل من</a>
              <a class="dropdown-item" href="#">تنظیمات</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">خروج</a>
            </div>
          </li>
        </ul>
        <ul class="navbar-nav mr-auto">


          <li class="nav-item">
            <p class="nav-link disabled mb-0 pl-3"><i class="far fa-calendar-alt"></i> {{$today_date}}</p>
          </li>
          <li class="nav-item">
            <p class="nav-link disabled mb-0"><i class="far fa-clock"></i> {{$today_time}}</p>
          </li>
        </ul>

      </div>
    </nav>


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




    <footer class="bg-dark mt-5 pt-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <p class="text-muted">۱۳۹۷ - منتشر شده با مجوز Creative Commons</p>
          </div>
        </div>
      </div>

    </footer>

    <script src="{{URL::asset('js/jquery-3.3.1.slim.min.js')}}"></script>
    <script src="{{URL::asset('js/popper.min.js')}}" ></script>
    <script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('js/main.js')}}"></script>

  </body>


</html>
