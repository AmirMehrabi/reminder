@extends('layouts.master')

@section('body')
<div class="container">
    <div class="row row justify-content-md-center">
        <div class="col-md-5  mt-5 pt-5">
          <div class="card" style="">
            <div class="card-body">
              <h5 class="card-title h4">ورود به وب‌سایت</h5>
              <hr>
              <form class="form-horizontal text-right" method="POST">
                  {{ csrf_field() }}

                <fieldset class="form-group">
                  <label for="email">آدرس ایمیل</label>
                  <input type="email" name="email" class="form-control" id="email" placeholder="برای مثال: amir@gmail.com">
                  @if ($errors->has('email'))
                      <span class="help-block">
                          <strong>{{ $errors->first('email') }}</strong> <br />
                      </span>
                  @endif
                  <small class="text-muted">ایمیل شما را با هیچکس به اشتراک نخواهیم گذاشت.</small>
                </fieldset>

                <button type="submit" class="btn btn-primary float-left">
                    ورود
                </button>
              </form>
            </div>
          </div>

        </div>
    </div>
</div>
@endsection
