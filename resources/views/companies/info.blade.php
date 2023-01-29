@extends('layouts.authorized')

@section('inner')
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&apikey=5bace636-c5e3-4d0c-9fb2-1f12ed9fc9bb" type="text/javascript"></script>
    <div class="container mb-5">
        <div class="row">
            <h3 id="company_name">{{$company->name}}</h3>
            <hr>
            <div class="col-md-4">
                @if ($company->logo)
                    <img class="p-0 ms-3" style="min-width: 100px; min-height: 100px; max-width:300px; max-height: 300px;" src="{{'/images/'.$company->logo}}" />
                @else
                    <p>no logo</p>
                @endif

            </div>
            <div class="col-md-8 border-start">
                <p>Email: {{$company->email??'-'}}</p>
                <p id="address_text">
                    Address: {{$company->address??'-'}}
                </p>
                <div id="map" style="width: 600px; height: 400px"></div>
            </div>
        </div>
    </div>
    {{view('employees.datatable', ['dataRoute' => route('company.employees.data', $company)])}}
    <script type="text/javascript">
        var coords = null;
        const ADDRESS_FIELD = $('#address_text');
        const COMPANY_NAME = $('#company_name');
        function findAddressCoordinates()
        {
            $.get( "https://geocode-maps.yandex.ru/1.x", {
                geocode: ADDRESS_FIELD.text(),
                apikey: "5bace636-c5e3-4d0c-9fb2-1f12ed9fc9bb",
                format: 'json',
                lang: 'ru_RU'
            }).done(function( data ) {
                if (data.response && data.response.GeoObjectCollection && data.response.GeoObjectCollection.featureMember.length > 0) {
                    let _coords = data.response.GeoObjectCollection.featureMember[0].GeoObject.Point.pos.split(' ');
                    coords = [_coords[1], _coords[0]];
                    ymaps.ready(init);
                }
                else {
                    $('<p>Address not found on Yandex maps</p>').insertAfter(ADDRESS_FIELD);
                    $('#map').hide();
                }
            });
        }

        function init() {
            let myMap = new ymaps.Map("map", {
                center: coords, // Координаты центра карты
                zoom: 13 // Маштаб карты
            });

            myMap.controls.add(
                new ymaps.control.ZoomControl()  // Добавление элемента управления картой
            );

            let myGeoObject = new ymaps.GeoObject({
                geometry: {
                    type: "Point",
                    coordinates: coords
                },
                properties: {
                    hintContent: COMPANY_NAME.text(),
                    balloonContentBody: COMPANY_NAME.text(),
                }
            });

            myMap.geoObjects.add(myGeoObject); // Добавление метки
        }
        findAddressCoordinates();
    </script>
@endsection
