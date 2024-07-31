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
                        <span class="text-white opacity-50 ml-auto mr-2 hidden-sm-down">
                            Не зарегистрированы?
                        </span>
                        <a href="{{ route('register') }}" class="btn-link text-white ml-auto ml-sm-0">
                            Зарегистрируйтесь
                        </a>
                    </div>
                </div>
                <div class="flex-1" style="background: url(style/img/svg/pattern-1.svg) no-repeat center bottom fixed; background-size: cover;">
                    <div class="container py-4 py-lg-5 my-lg-5 px-4 px-sm-0">
                        <div class="row">
                            <div class="col-xl-12">
                                <h2 class="fs-xxl fw-500 mt-4 text-white text-center">
                                    Вы не зарегистрированы.
                                    <small class="h3 fw-300 mt-3 mb-5 text-white opacity-60 hidden-sm-down">
                                    Пройдите регистрацию или войдите в систему.
                                    </small>
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection('content')