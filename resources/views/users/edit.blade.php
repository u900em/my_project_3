@extends('layout')

@section('map')
    <script src=" https://api-maps.yandex.ru/2.1/?apikey=<c59dea2c-6e2e-4eed-93ec-46b24708d7ac>&lang=ru_RU"></script>

    <script type="text/javascript">
        function init() {
            ymaps.geolocation.get({autoReverseGeocode: false,}).then(function(result) {
                var myGeoloc = result.geoObjects.get(0).geometry.getCoordinates();

                var myPlacemark,
                myMap = new ymaps.Map('my_map', {
                    center: myGeoloc,
                    zoom: 17,
                    controls: []
                });

                // Создание метки.
                function createPlacemark(coords) {
                    return new ymaps.Placemark(coords, {/* iconCaption: coords */}, {
                        preset: 'islands#violetDotIconWithCaption',
                    });
                }

                // Слушаем клик на карте.
                myMap.events.add('click', function (e) {
                    var coords = e.get('coords');

                    if (myPlacemark) {
                        myPlacemark.geometry.setCoordinates(coords);
                    }
                    else {
                        myPlacemark = createPlacemark(coords);
                        myMap.geoObjects.add(myPlacemark);
                    }
                    myPlacemark.properties.set('iconCaption', coords);
                    document.getElementById('address').value = coords;
                });
            });
        }
        ymaps.ready(init);
    </script>
@endsection('map')

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
                <i class='subheader-icon fal fa-plus-circle'></i> Редактировать
            </h1>
        </div>
        @if(session('status'))
            <div class="col-xl-6 alert alert-success text-dark" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="row">
            <div class="col-xl-6">
                <form action="{{ route('edit.general.info', ['id' => $infoUser->id]) }}" method="POST">
                    @csrf
                    <div id="panel-1" class="panel">
                        <div class="panel-container">
                            <div class="panel-hdr">
                                <h2>Общая информация</h2>
                            </div>
                            <div class="panel-content">
                                
                                <div class="form-group">
                                    <label class="form-label" for="simpleinput">Имя</label>
                                    <input type="text" name="name" id="simpleinput" class="form-control" value="{{ $infoUser->name }}">
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label" for="simpleinput">Место работы</label>
                                    <input type="text" name="job_title" id="simpleinput" class="form-control" value="{{ $infoUser->job_title }}">
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label" for="simpleinput">Номер телефона</label>
                                    <input type="text" name="tel" id="simpleinput" class="form-control" value="{{ $infoUser->tel }}">
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label" for="simpleinput">Координаты вашего адрес</label>
                                    <input type="text" name="address" id="address" class="form-control" value="{{ $infoUser->address }}">
                                </div>
                                <div class="col-md-12 mt-3 d-flex flex-row-reverse">
                                    <button class="btn btn-warning">Редактировать</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-xl-6">
                <div id="panel-1" class="panel">
                    <div class="panel-container">
                        <div id="my_map"></div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection('content')