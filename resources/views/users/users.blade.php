@extends('layout')

@section('content')
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary bg-primary-gradient">
        <a class="navbar-brand d-flex align-items-center fw-500" href="/users"><img alt="logo" class="d-inline-block align-top mr-2" src="style/img/logo.png"> Учебный проект</a> <button aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-target="#navbarColor02" data-toggle="collapse" type="button"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarColor02">
            @auth
                <ul class="navbar-nav ml-auto fw-500">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('page.profile') }}">{{ $auth_user->email }}</a>
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
    <body class="mod-bg-1 mod-nav-link">
        <main id="js-page-content" role="main" class="page-content mt-3">
            <div class="subheader">
                <h1 class="subheader-title">
                    <i class='subheader-icon fal fa-users'></i> Список пользователей
                </h1>
            </div>      
            <div class="row">
                <div class="col-xl-12">
                    @if($auth_user->role == 1)
                        <a class="btn btn-success" href="/create_user">Добавить</a>
                    @endif
                    <div class="border-faded bg-faded p-3 mb-g d-flex mt-3">
                        <input type="text" id="js-filter-contacts" name="filter-contacts" class="form-control shadow-inset-2 form-control-lg" placeholder="Найти пользователя">
                        <div class="btn-group btn-group-lg btn-group-toggle hidden-lg-down ml-3" data-toggle="buttons">
                            <label class="btn btn-default active">
                                <input type="radio" name="contactview" id="grid" checked="" value="grid"><i class="fas fa-table"></i>
                            </label>
                            <label class="btn btn-default">
                                <input type="radio" name="contactview" id="table" value="table"><i class="fas fa-th-list"></i>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            @if(session('status'))
                <div class="col-xl-4 alert alert-success text-dark" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            @foreach($users as $user)
                <div class="row" id="js-contacts">
                    <div class="col-xl-4">
                        <div id="c_1" class="card border shadow-0 mb-g shadow-sm-hover">
                            <div class="card-body border-faded border-top-0 border-left-0 border-right-0 rounded-top">
                                <div class="d-flex flex-row align-items-center">
                                    <span class="status status-{{ $user->status }} mr-3">
                                        @if($user->image == '')
                                            <span class="rounded-circle profile-image d-block" style="background-image:url('style/img/demo/avatars/avatar-m.png'); background-size: cover;"></span>      
                                        @else
                                            <span class="rounded-circle profile-image d-block" style="background-image:url('{{ $user->image }}'); background-size: cover;"></span>
                                        @endif
                                    </span>
                                    <div class="info-card-text flex-1">
                                        <a href="#" class="fs-xl text-truncate text-truncate-lg text-info" data-toggle="dropdown" aria-expanded="false">{{ $user->name }}
                                            @if($auth_user->role == 1 || $auth_user->email == $user->email)
                                                <i class="fal fas fa-cog fa-fw d-inline-block ml-1 fs-md"></i>
                                                <i class="fal fa-angle-down d-inline-block ml-1 fs-md"></i>
                                            @endif
                                        </a>
                                        @if($auth_user->role == 1 || $auth_user->email == $user->email)
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ route('show.edit.general.info', ['id' => $user->id]) }}">
                                                    <i class="fa fa-edit"></i>
                                                Редактировать</a>
                                                <a class="dropdown-item" href="{{ route('security', ['id' => $user->id]) }}">
                                                    <i class="fa fa-lock"></i>
                                                Безопасность</a>
                                                <a class="dropdown-item" href="{{ route('show.edit.status', ['id' => $user->id]) }}">
                                                    <i class="fa fa-sun"></i>
                                                Установить статус</a>
                                                <a class="dropdown-item" href="{{ route('show.edit.media', ['id' => $user->id]) }}">
                                                    <i class="fa fa-camera"></i>
                                                    Редактировать аватар
                                                </a>
                                                <a href="{{ route('delete.user', ['id' => $user->id]) }}" class="dropdown-item" onclick="return confirm('Are you sure?');">
                                                    <i class="fa fa-window-close"></i>
                                                    Удалить пользователя
                                                </a>
                                            </div>
                                        @endif
                                        <span class="text-truncate text-truncate-xl">{{ $user->job_title }}</span>
                                    </div>
                                    <button class="js-expand-btn btn btn-sm btn-default d-none" data-toggle="collapse" data-target="#c_1 > .card-body + .card-body" aria-expanded="false">
                                        <span class="collapsed-hidden">+</span>
                                        <span class="collapsed-reveal">-</span>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body p-0 collapse show">
                                <div class="p-3">
                                    <a href="tel:{{ $user->tel }}" class="mt-1 d-block fs-sm fw-400 text-dark">
                                        <i class="fas fa-mobile-alt text-muted mr-2"></i>{{ $user->tel }}</a>
                                    <a href="mailto:{{ $user->email }}" class="mt-1 d-block fs-sm fw-400 text-dark">
                                        <i class="fas fa-mouse-pointer text-muted mr-2"></i>{{ $user->email }}</a>
                                    <address class="fs-sm fw-400 mt-4 text-muted">
                                        <i class="fas fa-map-pin mr-2"></i>{{ $user->address}}</address>
                                    <div class="d-flex flex-row">
                                        <a href="https://{{ $user->vk }}" class="mr-2 fs-xxl" style="color:#4680C2">
                                            <i class="fab fa-vk"></i>
                                        </a>
                                        <a href="https://{{ $user->telega }}" class="mr-2 fs-xxl" style="color:#38A1F3">
                                            <i class="fab fa-telegram"></i>
                                        </a>
                                        <a href="https://{{ $user->insta }}" class="mr-2 fs-xxl" style="color:#E1306C">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </main>
    </body>
@endsection('content')
