@extends('adminPanel.main')

@section('menuContent')
	<div class="uk-card uk-card-default uk-card-body">
		<div class="uk-card-header uk-text-large">
			Добавление дополнительной опции
		</div>
		<div class="uk-margin">
			<form action="{{ route('adminPanel.options.addOption') }}" method="POST">
				{!! csrf_field() !!}
				<label class="uk-flex uk-flex-around">
					<div class="uk-width-1-3">
						Название
					</div>
					<input type="text" name="name" class="uk-input uk-width-1-3 uk-margin-left">
				</label>
				<label class="uk-flex uk-flex-around">
					<div class="uk-width-1-3">
						Цена
					</div>
					<input type="number" name="price" class="uk-input uk-width-1-3 uk-margin-left">
				</label>
			



					<div class="uk-margin-large-left uk-margin-top">
						<button type="submit" class="uk-button uk-button-default">Создать</button>
					</div>
			</form>
		</div>
	</div>
@endsection