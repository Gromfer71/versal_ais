@extends('adminPanel.main')

@section('menuContent')
	<div class="uk-card uk-card-default uk-card-body">
		<div class="uk-card-header uk-text-large">
			Изменение тура
		</div>
		<div class="uk-margin">
			<form action="{{ route('adminPanel.tours.tour', ['id' => $tour->id]) }}" method="POST">
				{!! csrf_field() !!}
				<label class="uk-flex uk-flex-around">
					<div class="uk-width-1-3">
						Город
					</div>
					<select name="city_id"  class="uk-select uk-width-1-3 uk-margin-left">

						@foreach($cities as $city)
							<option value="{{ $city->id }}" @if($tour->city) @if($city->id == $tour->city->id ?? null) selected @endif @endif>{{ $city->name }}</option>
						@endforeach
					</select>
				</label>
				<label class="uk-flex uk-flex-around">
					<div class="uk-width-1-3">
						Дата начала тура
					</div>
					<input type="date" name="dateStart" value="{{ $tour->dateStart }}" class="uk-input uk-width-1-3 uk-margin-left">
				</label>
				<label class="uk-flex uk-flex-around">
					<div class="uk-width-1-3">
						Дата окончания тура
					</div>
					<input type="date" name="dateFinish" value="{{ $tour->dateFinish }}" class="uk-input uk-width-1-3 uk-margin-left">
				</label>
				<div>
				</div>
				<label class="uk-flex uk-flex-around">
					<div class="uk-width-1-3">
						Цена
					</div>
					<input type="number" name="price" value="{{ $tour->price }}" class=" uk-width-1-3 uk-margin-left">
				</label>
				<label class="uk-flex uk-flex-around">
					<div class="uk-width-1-3">
						Отель
					</div>
					<select name="hotel_id" class="uk-select uk-width-1-3 uk-margin-left">

						@foreach($hotels as $hotel)
							<option value="{{ $hotel->id }}" @if($tour->hotel) @if($hotel->id == $tour->hotel->id ?? null) selected @endif @endif>{{ $hotel->name }}</option>
						@endforeach
					</select>
				</label>
				<label class="uk-flex uk-flex-around">
					<div class="uk-width-1-3">
						Количество людей
					</div>
					<input type="number" name="num_people" value="{{ $tour->num_people }}" class=" uk-width-1-3 uk-margin-left">
				</label>
				<label class="uk-flex uk-flex-around">
					<div class="uk-width-1-3">
						Описание
					</div>
					<textarea class="uk-textarea uk-width-1-3 uk-margin-left" name="describe" cols="30" rows="10">{{ $tour->describe }}</textarea>
				</label>


				<div class="uk-margin-large-left uk-margin-top">
					<button type="submit" class="uk-button uk-button-default">Сохранить</button>
				</div>
			</form>
			<div class="uk-margin-large-left uk-margin-top">
				<form action="{{ route('adminPanel.tours.deleteTour') }}" method="POST">
					{!! csrf_field() !!}
					<input type="hidden" name="id" value="{{ $tour->id }}">

					<button type="submit" class="uk-button uk-button-default" onclick="return confirm('Удалить?')">Удалить</button>
				</form>
			</div>

		</div>
	</div>
@endsection