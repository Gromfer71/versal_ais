@extends('adminPanel.main')

@section('menuContent')
	<div class="uk-card uk-card-default uk-card-body">
		<div class="uk-card-header uk-text-large">
			Изменение отеля
		</div>
		<div class="uk-margin">
			<form action="{{ route('adminPanel.hotels.hotel', ['id' => $hotel->id]) }}" method="POST">
				{!! csrf_field() !!}
				<label class="uk-flex uk-flex-around">
					<div class="uk-width-1-3">
						Название
					</div>
					<input type="text" name="name" value="{{ $hotel->name }}" class="uk-input uk-width-1-3 uk-margin-left">
				</label>
				<label class="uk-flex uk-flex-around">
					<div class="uk-width-1-3">
						Рейтинг
					</div>
					<input type="number" name="rating" min="0" max="5"  step="0.1" value="{{ $hotel->rating }}" class="uk-input uk-width-1-3 uk-margin-left">
				</label>
				<div>
				</div>
				<label class="uk-flex uk-flex-around">
					<div class="uk-width-1-3">
						Описание
					</div>

					<textarea name="describe" class="uk-width-1-3 uk-margin-left" cols="30" rows="10">{{ $hotel->describe }}</textarea>
				</label>
				<label class="uk-flex uk-flex-around">
					<div class="uk-width-1-3">
						Опции
					</div>
					<select name="options[]" multiple class="uk-select uk-width-1-3 uk-margin-left">
						@foreach($options as $option)
							<option value="{{ $option->id }}" @if(in_array($option->id, $hotel->options->toArray())) selected @endif>{{ $option->name }}</option>
						@endforeach
					</select>

				</label>



				<div class="uk-margin-large-left uk-margin-top">
					<button type="submit" class="uk-button uk-button-default">Сохранить</button>
				</div>
			</form>
			<div class="uk-margin-large-left uk-margin-top">
				<form action="{{ route('adminPanel.hotels.deleteHotel') }}" method="POST">
					{!! csrf_field() !!}
					<input type="hidden" name="id" value="{{ $hotel->id }}">

					<button type="submit" class="uk-button uk-button-default" onclick="return confirm('Удалить?')">Удалить</button>
				</form>
			</div>

		</div>
	</div>
@endsection