@extends('layouts.master')

@section('title', 'دیگر تاریخ تولد آشنایان را فراموش مکن')



@section('body')
  <section class="intro">
    <div class="container">
      <div class="row justify-content-md-center">
        <div class="col col-md-5 text-center">
          <script type="text/javascript">
  $(document).ready(function() {
    $(".date_input").pDatepicker(
      {
        "format": "LLLL",
        "viewMode": "year",
        "initialValue": true,
        "minDate": null,
        "autoClose": false,
        "position": "auto",
        "altFormat": "YYYY/MM/DD",
        "timePicker": {
            "enabled": false,
            "meridiem": {
                "enabled": true
            }
        },
        "altField": "#date_input",
        "onlyTimePicker": false,
        "calendarType": "persian",
        "inputDelay": 800,
        "observer": false,
        "calendar": {
          "persian": {
            "locale": "fa",
            "showHint": true,
            "leapYearMode": "algorithmic"
          },
          "gregorian": {
            "locale": "en",
            "showHint": false
          }
        },
        "navigator": {
          "enabled": true,
          "scroll": {
            "enabled": true
          },
          "text": {
            "btnNextText": "<",
            "btnPrevText": ">"
          }
        },
        "toolbox": {
          "enabled": true,
          "calendarSwitch": {
            "enabled": true,
            "format": "تغییر تقویم"
          },
          "todayButton": {
            "enabled": true,
            "text": {
              "fa": "امروز",
              "en": "Today"
            }
          },
          "submitButton": {
            "enabled": true,
            "text": {
              "fa": "تایید",
              "en": "Submit"
            }
          },
          "text": {
            "btnToday": "امروز"
          }
        },
        "timePicker": {
          "enabled": false,
          "step": 1,
          "hour": {
            "enabled": false,
            "step": null
          },
          "minute": {
            "enabled": false,
            "step": null
          },
          "second": {
            "enabled": false,
            "step": null
          },
          "meridian": {
            "enabled": true
          }
        },
        "dayPicker": {
          "enabled": true,
          "titleFormat": "YYYY MMMM"
        },
        "monthPicker": {
          "enabled": true,
          "titleFormat": "YYYY"
        },
        "yearPicker": {
          "enabled": true,
          "titleFormat": "YYYY"
        },
        "responsive": true
      }
    );
  });
</script>

          <div class="calc-form">
            @if (session()->has('status'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <h1 class="h3 mb-3 font-weight-normal">دیگر تاریخ تولدها را فراموش نکنید</h1>
            @if (Auth::user())
              {!! Form::open(['route' => 'birthday.store']) !!}
            @endif
            <div class="input-group input-group-lg ltr pt-4">
              <input type="text"  class="form-control no-border rtl main-input" name="name" placeholder="نام و نام خانوادگی متولد">
            </div>
            <div class="input-group input-group-lg ltr pt-4">
              <input type="text" class="form-control no-border ltr main-input date_input" id="date_input" name="birthday_date" placeholder="۱۳۷۴ / ۰۶ / ۱۸">
            </div>
            <div class="input-group input-group-lg ltr pt-4">
              @if (Auth::user())
                {!! Form::submit('ذخیره', ['class' => 'btn btn-lg btn-warning uneditable-input btn-block r-1']); !!}
                @else
                  <button type="button" class="btn btn-lg btn-warning uneditable-input btn-block r-1" data-toggle="modal" data-target="#loginampleModal">
                    ذخیره
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="loginampleModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title float-right" id="loginModalLabel">لطفا برای استفاده از سیستم، وارد شوید</h5>
                          <button type="button" class="close float-left" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body text-right">
                            {!! Form::open(['route' => 'login', 'method' => 'post']) !!}
                              {{ csrf_field() }}

                            <fieldset class="form-group text-right">
                              <label for="email">آدرس ایمیل</label>
                              <input type="email" name="email" class="form-control" id="email" placeholder="برای مثال: amir@gmail.com">
                              @if ($errors->has('email'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('email') }}</strong> <br />
                                  </span>
                              @endif
                              <small class="text-muted">ایمیل شما را با هیچکس به اشتراک نخواهیم گذاشت.</small>
                            </fieldset>



                        </div>
                        <div class="modal-footer float-left">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                          <button type="submit" class="btn btn-primary text-left">
                              ورود
                          </button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
              @endif
            </div>
          </div>
          @if (Auth::user())
            {!! Form::close() !!}

          @endif
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
