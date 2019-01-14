@extends('layouts.master')

@section('title', 'دیگر تاریخ تولد آشنایان را فراموش مکنکن')



@section('body')
  <section class="profile-header">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <img src="http://carta.fiu.edu/arts/wp-content/uploads/sites/2/2015/12/avatar-placeholder.png" class="rounded-circle img-prof-avatar" alt="">
        </div>
      </div>
    </div>
  </section>


    <section class="profile-section">
      <div class="container">
        @if (session()->has('status'))
          <div class="row">
            <div class="col-md-12">
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            </div>
          </div>
        @endif
        @if ($errors->any())
          <div class="row">
            <div class="col-md-12">
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
            </div>
          </div>

        @endif
        <div class="row text-center">


          <div class="col-md-4 text-center">
            <p class="h6 text-muted ">نام</p>
            <input type="text" name="" class="form-control" value="{{Auth::user()->name}}">
          </div>
          <div class="col-md-4 text-center">
            <p class="h6 text-muted ">آدرس ایمیل</p>
            <input type="text" name="" class="form-control" value="{{Auth::user()->email}}">
          </div>
          <div class="col-md-4 text-center">
            <p class="h6 text-muted ">شماره موبایل</p>
            <input type="text" name="" class="form-control" value="{{Auth::user()->phone_no}}">
          </div>

        </div>
        <div class="row  justify-content-end">
          <div class="col-md-4">
            <button type="button" class="btn btn-primary btn-block mt-2" name="button">ذخیرهٔ تغییرات</button>
          </div>
        </div>

        <hr>

        <div class="row">
          <div class="col-md-12">
            <h1 class="h3 font-weight-bold text-right mt-3 mb-3">تاریخ تولد‌های ثبت شده:</h1>
          </div>
        </div>

        <div class="row">
          @foreach ($birthdays as $key => $birthday)
            <div class="col-md-4  mb-3">
              <div class="card">
                <div class="card-header">
                  <h5>{{$birthday->name}}</h5>
                </div>
                <div class="card-body">
                  <h5 class="card-title">تاریخ تولد: {{jdate(\Carbon\Carbon::parse($birthday->birthday_date))->format('Y/m/d')}}</h5>

                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal-{{$key}}">
                    ویرایش
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal-{{$key}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-{{$key}}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel-{{$key}}">ویرایش تولد {{$birthday->name}}</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          {!! Form::model($birthday, ['route' => ['birthday.update', $birthday->id], 'method' => 'put']) !!}
                            <fieldset class="form-group">
                              <label for="">نام و نام خانوادگی</label>
                              <input type="text" name="name" class="form-control" id="" placeholder="نام متولد را وارد کنید" value="{{$birthday->name}}">
                            </fieldset>
                            <fieldset class="form-group">
                              <label for="">تاریخ تولد</label>
                              <input type="text" name="birthday_date" class="form-control date_input" id="date_input" placeholder="تاریخ تولد" />

                            </fieldset>


                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                          {!! Form::submit('ذخیره تغییرات', ['class' => 'btn btn-primary mr-2']) !!}
                          {!! Form::close() !!}
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter-{{$key}}-">
                    حذف
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="exampleModalCenter-{{$key}}-" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter-{{$key}}-Title" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalCenter-{{$key}}-Title">حذف تولد {{$birthday->name}}</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body text-right">
                          <p>آیا از حذف این تولد اطمینان دارید؟</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                          {!! Form::model($birthday, ['route' => ['birthday.destroy', $birthday->id], 'method' => 'delete']) !!}
                            <button type="submit" class="btn btn-danger mr-2">اطمینان دارم، حذف کن</button>
                          {!! Form::close() !!}

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @endforeach

        </div>
      </div>
    </section>

@stop
