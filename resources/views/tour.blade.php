@extends('layouts.app')


@section('content')
        
		<div class="container" style=" font-style: normal; font-weight: 500px; font-size: 21px; line-height: 30px; color: #000000;">
			<div class="  uk-text-bolder" style="font-size: 27px" >
				{{ $tour->city->name ?? '-' }}
			</div>
			<p>
			<b>Дата вылета:</b> {{ $tour->dateStart }}
			<br>
			<b>Дата прилета:</b>{{ $tour->dateFinish }}
			<p>
			<b>Отель:</b> {{ $tour->hotel->name }}
            <br>
			<b>Цена:</b> {{ $tour->price }} рублей
			<br>
			<b>Количество отдыхающих:</b> {{ $tour->num_people }} чел.
			<p>
			<b>Описание:</b>
			</p>
			{{ $tour->describe }}
			<p>
			    
			<img width="350" height="360" src="{{ asset('img/' . $tour->id . '_1.jpg') }}"  alt="">
            <img width="350" height="360" src="{{ asset('img/' . $tour->id . '_2.jpg') }}"  alt="">
            <img width="350" height="360" src="{{ asset('img/' . $tour->id . '_3.jpg') }}" >
		
		    <p uk-margin>
            <a class="uk-button uk-button-primary uk-button-large" href="{{ route('createRequest', $tour->id) }}"><b>Оставить заявку на бронирование</b></a>
            </p>
		
	
      </div>  
     
@endsection