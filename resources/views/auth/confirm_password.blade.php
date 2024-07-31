@extends('layout')

@section('content')
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary bg-primary-gradient">
        <a class="navbar-brand d-flex align-items-center fw-500" href="/users"><img alt="logo" class="d-inline-block align-top mr-2" src="style/img/logo.png"> Учебный проект</a> <button aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-target="#navbarColor02" data-toggle="collapse" type="button"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarColor02">
            @auth
                <ul class="navbar-nav ml-auto fw-500">
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">Выйти</a>
                        </form>
                    </li>
                </ul>
            @endauth
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-3 mx-auto fixed-top my_class">
                <div class="page-logo m-0 w-100 align-items-center justify-content-center rounded border-bottom-left-radius-0 border-bottom-right-radius-0 px-4">
                    <div class="page-logo-link press-scale-down d-flex align-items-center">
                        <img src="style/img/logo.png" alt="SmartAdmin WebApp" aria-roledescription="logo">
                        <span class="page-logo-text mr-1">Confirm Password</span>
                    </div>
                </div>
                <div class="card p-4 border-top-left-radius-0 border-top-right-radius-0">
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger text-dark" role="alert">
                            {{ $error }}
                        </div>
                    @endforeach
                    <form action="{{ route('password.confirm') }}" method="POST" class="space-y-6">
                        @csrf
                        <div class="form-group">
                            <label class="form-label" for="username">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Minimum 3 characters">
                        </div>
                        <button type="submit" class="btn btn-default float-right">Confirm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <video poster="style/img/backgrounds/clouds.png" id="bgvid" playsinline autoplay muted loop>
        <source src="style/media/video/cc.webm" type="video/webm">
        <source src="style/media/video/cc.mp4" type="video/mp4">
    </video>
@endsection('content')