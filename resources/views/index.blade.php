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
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
        </ul>
        <ul class="navbar-nav mr-auto">


          <li class="nav-item">
            <p class="nav-link disabled mb-0 pl-3"><i class="far fa-calendar-alt"></i> چهارشنبه ۵ دی</p>
          </li>
          <li class="nav-item">
            <p class="nav-link disabled mb-0"><i class="far fa-clock"></i> ۰۹:۳۱ ب.ظ</p>
          </li>
        </ul>

      </div>
    </nav>


    <section class="intro">
      <div class="container">
        <div class="row   justify-content-md-center">
          <div class="col col-md-5 text-center">
            <div class="calc-form">
              <h1 class="h3 mb-3 font-weight-normal">دیگر تاریخ تولدها را فراموش نکنید</h1>
              <div class="input-group input-group-lg ltr pt-4">
                <input type="text" class="form-control no-border rtl main-input" id="finalPrice" placeholder="نام و نام خانوادگی متولد">
              </div>
              <div class="input-group input-group-lg ltr pt-4">
                <input type="text" class="form-control no-border ltr main-input" id="finalPrice" placeholder="۱۳۷۴ / ۰۶ / ۱۸">
              </div>
              <div class="input-group input-group-lg ltr pt-4">
                <button class="btn btn-lg btn-warning uneditable-input btn-block r-1"  id="calculate" type="button">ذخیره</button>
              </div>
            </div>
            <div class="calculated-price mt-4 " id="calculated-price">

            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="birthdays">
      <div class="container">
        <div class="row text-center">
          <div class="col-md-4">
            <div class="c100 p10 big green">
                <span>۳۳۰ روز</span>
                <div class="slice">
                    <div class="bar"></div>
                    <div class="fill"></div>
                </div>
            </div>
            <div class="clearfix">
            </div>
            <p class="h4 pt-3">م. اسماعیل خانی</p>
            <p class="h6 text-muted">تاریخ تولد: ۱۳۷۰/۰۱/۰۱</p>
          </div>
          <div class="col-md-4">
            <div class="c100 p50 big green">
                <span>۲۵۰ روز</span>
                <div class="slice">
                    <div class="bar"></div>
                    <div class="fill"></div>
                </div>
            </div>
            <div class="clearfix">
            </div>
            <p class="h4 pt-3">حمیدرضا پورخوش‌سفر</p>
            <p class="h6 text-muted">تاریخ تولد: ۱۳۷۳/۰۱/۰۱</p>
          </div>
          <div class="col-md-4">
            <div class="c100 p60 big green">
                <span>۱۲۰ روز</span>
                <div class="slice">
                    <div class="bar"></div>
                    <div class="fill"></div>
                </div>
            </div>
            <div class="clearfix">
            </div>
            <p class="h4 pt-3">امیرمسعود مهرابیان</p>
            <p class="h6 text-muted">تاریخ تولد: ۱۳۷۴/۰۶/۱۸</p>
          </div>
        </div>
      </div>
    </section>



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
