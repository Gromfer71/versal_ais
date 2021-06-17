@extends('layouts.app')


@section('content')
 <div class="panel-heading uk-text-lead uk-text-center uk-text-bolder" style=" font-style: normal; font-weight: 500px; font-size: 30px; line-height: 60px; color: #000000;">
     Подбор тура</div>

    <div class=" uk-width-1-1">
        <form action="{{ route('search') }}" method="POST">
                {!! csrf_field() !!}
        
        <div class="uk-card uk-card-default uk-card-body ">
            
                <div class="uk-flex uk-flex-around  uk-width-1-2 uk-align-center">
                    
                    <div>
                        <h4>Страны</h4>
                            @foreach($cities as $id => $city)
                                        <div style="float: left; margin-left:20px">
                                            <label>
                                                <input type="checkbox" name="city[{{ $id }}]" value="{{ $id }}"> {{ $city->name }}
                                            </label>
                                            <br>
                                        </div>
                                        @endforeach
                        <br>
                        <h4>Дополнительные опции</h4>

                        @foreach($options as $id => $option)
                        <div style="float: left; margin-left:20px">
                            <label>
                                <input type="checkbox" name="option[{{ $id }}]" value="{{ $id }}"> {{ $option->name }}
                            </label>
                            <br>
                            </div>
                        @endforeach
                        <br>
                        <h4>Отели</h4>
                        @foreach($hotels as $id => $hotel)
                        <div style="float: left; margin-left:20px">
                            <label>
                                <input type="checkbox" name="hotel[{{ $id }}]"> {{ $hotel->name }}
                            </label>
                            <br>
                        </div>  
                        @endforeach
                    </div>


                </div>
                <p>
                <div class="uk-text-center">
                    <button type="submit" class="uk-button uk-button-primary"><b>Найти туры</b></button>
                </div>
            

        </div>
        </form>
    </div>
    <br>
    <div class="uk-text-center uk-text-bolder"
         style=" font-style: normal; font-weight: 500px; font-size: 30px; line-height:60px; color: #000000;">
        Вот, что мы нашли для Вас
    </div>

    <table class="table table-hover" style="width: 80%; margin-left: 10%;">
        <!-- <thead>
        <th class="table__td-w1">#</th>
        <th class="table__td-w1">Фото</th>
        <th class="table__td-w1">Город</th>
        <th class="table__td-w1">Город</th>
        <th class="table__td-w1">Начало</th>
        <th class="table__td-w1">Конец</th>
        <th class="table__td-w1">Цена</th>
        <th class="table__td-w1">Отель</th>
        <th class="table__td-w1">Количество людей</th>
        <th class="table__td-w1">Описание</th>
        </thead>-->

        <br>
        <tbody>

        @foreach($tours as $tour)
            <tr>
            <!--<td>{{ $tour->id }}</td>-->
                <td><img class="uk-preserve-width uk-border-rounded" src="{{ asset('img/' . $tour->id . '_1.jpg') }}"
                         width="400" alt=""></td>
                <td><a href="{{ route('tour', $tour->id) }}" class=" uk-padding-remove">
                        <div style=" font-style: normal; font-weight: 500px; font-size: 21px; line-height: 25px; color: #000000;">
                            <b> {{ $tour->city->name ?? '-' }} </b>
                        </div>
                    </a></td>
                <td>
                    <div style=" font-style: normal; font-weight: 500px; font-size: 21px; line-height: 25px; color: #000000;">
                        <b>Вылет:</b> {{ $tour->dateStart }}</td>
                </div>


                <td>
                    <div style=" font-style: normal; font-weight: 500px; font-size: 21px; line-height:25px; color: #000000;">
                        <b>Прилет:</b> {{ $tour->dateFinish }}</td>
                </div>


                <td>
                    <div style=" font-style: normal; font-weight: 500px; font-size: 21px; line-height: 25px; color: #000000;">
                        <b>Цена:</b> {{ $tour->price }} р.
                </td>
                </div>

                @if($tour->hotel)
                    <td><a href="{{ route('adminPanel.hotels.hotel', $tour->hotel->id) }}">
                            <div style=" font-style: normal; font-weight: 500px; font-size: 21px; line-height: 25px; color: #000000;">
                                <b>Отель: </b>{{ $tour->hotel->name }}</a></td>
                    </div>
                @else
                    <td>-</td>
                @endif
                <td>
                    <div style=" font-style: normal; font-weight: 500px; font-size: 21px; line-height: 25px; color: #000000;">
                        {{ $tour->num_people }} человек(-а)
                    </div>
                </td>
                <td>
                    <div class="uk-text-break"
                         style=" font-style: normal; font-weight: 500px; font-size: 18px; line-height: 25px; color: #000000;">
                        {{ $tour->describe }}
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div>

    </div>



@endsection