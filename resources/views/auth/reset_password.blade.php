@extends('layout')

@section('content')
<head>
    <link rel="apple-touch-icon" sizes="180x180" href="style/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="style/img/favicon/favicon-32x32.png">
    <link rel="mask-icon" href="style/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="stylesheet" media="screen, print" href="style/css/page-login-alt.css">
</head>
<body>
    <div class="blankpage-form-field">
        <div class="page-logo m-0 w-100 align-items-center justify-content-center rounded border-bottom-left-radius-0 border-bottom-right-radius-0 px-4">
            <div class="page-logo-link press-scale-down d-flex align-items-center">
                <img src="style/img/logo.png" alt="SmartAdmin WebApp" aria-roledescription="logo">
                <span class="page-logo-text mr-1">Reset Password</span>
            </div>
        </div>
        <div class="card p-4 border-top-left-radius-0 border-top-right-radius-0">
            @foreach($errors->all() as $error)
                <div class="alert alert-danger text-dark" role="alert">
                    {{ $error }}
                </div>
            @endforeach
            @if(session('status'))
                <div class="alert alert-success text-dark" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{ route('update.password') }}" method="POST" class="space-y-6">
                @csrf
                <input type="hidden" name="token" value="{{ $request->token }}">
                <div class="form-group">
                    <label class="form-label" for="username">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email', $request->email) }}">
                </div>
                <div class="form-group">
                    <label class="form-label" for="userpassword">Password<br></label>
                    <input type="password" name="password" id="userpassword" class="form-control" placeholder="Minimum 3 characters">
                </div>
                <div class="form-group">
                    <label class="form-label" for="userpassword">Confirm Password<br></label>
                    <input type="password" name="password_confirmation" id="userpassword" class="form-control" placeholder="Confirm Password">
                </div>
                <button type="submit" class="btn btn-default float-right">Reset Password</button>
            </form>
        </div>
    </div>
    <video poster="style/img/backgrounds/clouds.png" id="bgvid" playsinline autoplay muted loop>
        <source src="style/media/video/cc.webm" type="video/webm">
        <source src="style/media/video/cc.mp4" type="video/mp4">
    </video>
</body>
@endsection('content')