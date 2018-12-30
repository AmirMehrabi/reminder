<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>متولد | @yield('title')</title>

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


    @yield('body')






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
