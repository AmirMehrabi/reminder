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
                  <label for="phone"> شماره تلفن همراه</label>
                  <input type="text" name="phone" class="form-control" id="phone" placeholder="برای مثال: 09361856666">
                  @if ($errors->has('phone'))
                      <span class="help-block">
                          <strong>{{ $errors->first('phone') }}</strong> <br />
                      </span>
                  @endif
                  <small class="text-muted">شماره تلفن همراه شما را با هیچکس به اشتراک نخواهیم گذاشت.</small>
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
