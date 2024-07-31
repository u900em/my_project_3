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
            <i class='subheader-icon fal fa-image'></i> Загрузить аватар
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
    <form action="{{ route('edit.image', ['id' => $dataUser->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xl-6">
                <div id="panel-1" class="panel">
                    <div class="panel-container">
                        <div class="panel-hdr">
                            <h2>Текущий аватар</h2>
                        </div>
                        <div class="panel-content">
                            <div class="form-group">
                                <img src="@if($dataUser->image == '')
                                                style/img/demo/avatars/avatar-m.png
                                            @else
                                                {{ $dataUser->image }}
                                            @endif"
                                style="border-radius: 100px" class="img-responsive" height="200" width="200">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="example-fileinput">Выберите аватар</label>            
                                <input type="file" name="image" id="example-fileinput" class="form-control-file">
                            </div>
                            <a href="{{ route('delete.image', ['id' => $dataUser->id]) }}" class="form-label" onclick="return confirm('Are you sure?');">Удалить аватар</a>
                            <div class="col-md-12 mt-3 d-flex flex-row-reverse">
                                <button class="btn btn-warning">Загрузить</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</main>
@endsection('content')