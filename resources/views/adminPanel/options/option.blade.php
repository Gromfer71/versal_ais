@extends('adminPanel.main')

@section('menuContent')
	<div class="uk-card uk-card-default uk-card-body">
		<div class="uk-card-header uk-text-large">
			Изменение дополнительной опции
		</div>
		<div class="uk-margin">
			<form action="{{ route('adminPanel.options.option', ['id' => $option->id]) }}" method="POST">
				{!! csrf_field() !!}
				<label class="uk-flex uk-flex-around">
					<div class="uk-width-1-3">
						Название
					</div>
					<input type="text" name="name" value="{{ $option->name }}" class="uk-input uk-width-1-3 uk-margin-left">
				</label>
				<label class="uk-flex uk-flex-around">
					<div class="uk-width-1-3">
						Цена
					</div>
					<input type="number" name="price" value="{{ $option->price }}" class="uk-input uk-width-1-3 uk-margin-left">
				</label>
				<div>
				</div>
		



				<div class="uk-margin-large-left uk-margin-top">
					<button type="submit" class="uk-button uk-button-default">Сохранить</button>
				</div>
			</form>
			<div class="uk-margin-large-left uk-margin-top">
				<form action="{{ route('adminPanel.options.deleteOption') }}" method="POST">
					{!! csrf_field() !!}
					<input type="hidden" name="id" value="{{ $option->id }}">

					<button type="submit" class="uk-button uk-button-default" onclick="return confirm('Удалить?')">Удалить</button>
				</form>
			</div>

		</div>
	</div>
@endsection