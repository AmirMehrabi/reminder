@extends('layouts.master')

@section('body')
<div class="container">
    <div class="row row justify-content-md-center">
        <div class="col-md-5  mt-5 pt-5">
          <div class="card" style="">
            <div class="card-body">
              <h5 class="card-title h4">احراز هویت</h5>
              <hr>
                  {{Form::open(array('url'=>'auth/token/', 'method' => 'post'))}}

                  {{ csrf_field() }}

                <fieldset class="form-group text-right">
                  <label for="token">تا لحظاتی دیگر یک کد تائید برای شما ایمیل خواهد شد. آن را در فیلد زیر وارد کنید.</label>
                  <input type="token" name="token" class="form-control" id="token" placeholder="برای مثال: 7SaPL">
                  @if ($errors->has('token'))
                      <span class="help-block">
                          <strong>{{ $errors->first('token') }}</strong> <br />
                      </span>
                  @endif
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
