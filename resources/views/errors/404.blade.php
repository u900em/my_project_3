@extends('layout')
<head>
    <link rel="apple-touch-icon" sizes="180x180" href="style/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="style/img/favicon/favicon-32x32.png">
    <link rel="mask-icon" href="style/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="stylesheet" media="screen, print" href="style/css/page-login-alt.css">
</head>
@section('content')
    <div class="page-logo h-50 blankpage-form-field rounded border-bottom-left-radius-0 border-bottom-right-radius-0">
        <div class="col-xl-12">
            <h2 class="fs-xxl fw-500 mt-4 text-white text-center">
                Error 404
                <small class="h3 fw-300 mt-3 mb-5 text-white opacity-60 hidden-sm-down">
                    Page is Not Found
                </small>
            </h2>
        </div>
    </div>
    <video poster="style/img/backgrounds/clouds.png" id="bgvid" playsinline autoplay muted loop>
        <source src="style/media/video/cc.webm" type="video/webm">
        <source src="style/media/video/cc.mp4" type="video/mp4">
    </video>
@endsection('content')