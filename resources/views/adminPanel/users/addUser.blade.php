@extends('adminPanel.main')

@section('menuContent')
	<div class="uk-card uk-card-default uk-card-body">
		<div class="uk-card-header uk-text-large">
			Добавление пользователя
		</div>
		<div class="uk-margin">
			<form action="{{ route('adminPanel.users.addUser') }}" method="POST">
				{!! csrf_field() !!}
				<label class="uk-flex uk-flex-around">
					<div class="uk-width-1-3">
						Почта
					</div>
					<input type="email" name="email" class="uk-input uk-width-1-3 uk-margin-left">
				</label>
				<label class="uk-flex uk-flex-around">
					<div class="uk-width-1-3">
						Имя
					</div>
					<input type="text" name="name" class="uk-input uk-width-1-3 uk-margin-left">
				</label>
				<label class="uk-flex uk-flex-around">
					<div class="uk-width-1-3">
						Пароль
					</div>
					<input type="password" name="password" class="uk-input uk-width-1-3 uk-margin-left">
				</label>

				@foreach(\App\Role::getRoles() as $role)
					<label class="uk-flex uk-flex-around">
						<div class="uk-width-1-3">
							{{ trans('roles.'.$role) }}
						</div>
						<input type="checkbox" name="{{ $role }}" class="checkbox uk-width-1-3 uk-margin-left">
					</label>
				@endforeach
				</label>
					<div class="uk-margin-large-left uk-margin-top">
						<button type="submit" class="uk-button uk-button-default">Создать</button>

					</div>
			</form>
		</div>
	</div>
@endsection