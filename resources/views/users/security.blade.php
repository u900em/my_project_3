@extends('layout')

@section('content')
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary bg-primary-gradient">
        <a class="navbar-brand d-flex align-items-center fw-500" href="/users"><img alt="logo" class="d-inline-block align-top mr-2" src="style/img/logo.png"> Учебный проект</a> <button aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-target="#navbarColor02" data-toggle="collapse" type="button"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarColor02">
            @auth
                <ul class="navbar-nav ml-auto fw-500">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('page.profile') }}">{{ $authUser->email }}</a>
                    </li>
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
    <main id="js-page-content" role="main" class="page-content mt-3">
        <div class="subheader">
            <h1 class="subheader-title">
                <i class='subheader-icon fal fa-lock'></i> Безопасность
            </h1>
        </div>
        @if(session('status'))
            <div class="col-xl-6 alert alert-success text-dark" role="alert">
                {{ session('status') }}
            </div>
        @endif
        @foreach($errors->all() as $error)
            <div class="col-xl-6 alert alert-danger text-dark" role="alert">
                {{ $error }}
            </div>
        @endforeach
        <form action="{{ route('edit.security', ['id' => $credentials->id]) }}" method="POST">
            <div class="row">
                <div class="col-xl-6">
                    <div id="panel-1" class="panel">
                        <div class="panel-container">
                            <div class="panel-hdr">
                                <h2>Обновление эл. адреса и пароля</h2>
                            </div>
                            <div class="panel-content">
                                @csrf
                                <div class="form-group">
                                    <label class="form-label" for="simpleinput">Email</label>
                                    <input type="email" name="email" id="simpleinput" class="form-control" placeholder="{{ $credentials->email }}" value="{{ old('email') }}">
                                </div>
                                @if($authUser->role == 0)
                                    <div class="form-group">
                                        <label class="form-label" for="simpleinput">Password<br></label>
                                        <input type="password" name="password" id="simpleinput" class="form-control" placeholder="Minimum 3 characters">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="userpassword">New Password<br></label>
                                        <input type="password" name="new_password" id="userpassword" class="form-control" placeholder="New Password">
                                    </div>
                                @endif
                                <div class="col-md-12 mt-3 d-flex flex-row-reverse">
                                    <button class="btn btn-warning">Изменить</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>
@endsection('content')