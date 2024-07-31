@extends('layout')

@section('content')
    <body>
        <div class="page-wrapper auth">
            <div class="page-inner bg-brand-gradient">
                <div class="page-content-wrapper bg-transparent m-0">
                    <div class="height-10 w-100 shadow-lg px-4 bg-brand-gradient">
                        <div class="d-flex align-items-center container p-0">
                            <div class="page-logo width-mobile-auto m-0 align-items-center justify-content-center p-0 bg-transparent bg-img-none shadow-0 height-9 border-0">
                                <a href="{{ route('users') }}" class="page-logo-link press-scale-down d-flex align-items-center">
                                    <img src="style/img/logo.png" alt="SmartAdmin WebApp" aria-roledescription="logo">
                                    <span class="page-logo-text mr-1">Учебный проект</span>
                                </a>
                            </div>
                            <span class="text-white opacity-50 ml-auto mr-2 hidden-sm-down">
                                Уже зарегистрированы?
                            </span>
                            <a href="{{route('login')}}" class="btn-link text-white ml-auto ml-sm-0">
                                Войти
                            </a>
                        </div>
                    </div>
                    <div class="flex-1" style="background: url(style/img/svg/pattern-1.svg) no-repeat center bottom fixed; background-size: cover;">
                        <div class="container py-4 py-lg-5 my-lg-5 px-4 px-sm-0">
                            <div class="row">
                                <div class="col-xl-12">
                                    <h2 class="fs-xxl fw-500 mt-4 text-white text-center">
                                        Регистрация
                                        <small class="h3 fw-300 mt-3 mb-5 text-white opacity-60 hidden-sm-down">
                                            Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться.
                                            <br>
                                            По своей сути рыбатекст является альтернативой традиционному lorem ipsum   
                                        </small>
                                    </h2>
                                </div>
                                <div class="col-xl-6 ml-auto mr-auto">
                                    <div class="card p-4 rounded-plus bg-faded">
                                        @foreach($errors->all() as $error)
                                            <div class="alert alert-danger text-dark" role="alert">
                                                {{ $error }}
                                            </div>
                                        @endforeach
                                        <form id="js-login" method="POST" action="{{route('register')}}" class="space-y-6">
                                            @csrf
                                            <div class="form-group">
                                                <label class="form-label" for="usernameverify">Name</label>
                                                <input type="text" name="name" id="usernameverify" class="form-control" placeholder="Ivan Ivanov" value="{{old('name')}}">
                                                <div class="invalid-feedback">Заполните поле.</div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="emailverify">Email</label>
                                                <input type="email" name="email" id="emailverify" class="form-control" placeholder="Email address" value="{{old('email')}}">
                                                <div class="invalid-feedback">Заполните поле.</div>
                                                <div class="help-block">This an email address will be your login for authorization.</div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="userpassword">Password<br></label>
                                                <input type="password" name="password" id="userpassword" class="form-control" placeholder="Minimum 3 characters">
                                                <div class="invalid-feedback">Заполните поле.</div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="userpassword">Confirm Password<br></label>
                                                <input type="password" name="password_confirmation" id="userpassword" class="form-control" placeholder="Confirm Password">
                                                <div class="invalid-feedback">Заполните поле.</div>
                                            </div>
                                            <div class="row no-gutters">
                                                <div class="col-md-4 ml-auto text-right">
                                                    <button id="js-login-btn" type="submit" class="btn btn-block btn-danger btn-lg mt-3">Регистрация</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection('content')