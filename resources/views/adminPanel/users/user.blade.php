@extends('adminPanel.main')

@section('menuContent')
	<div class="uk-card uk-card-default uk-card-body">
		<div class="uk-card-header uk-text-large">
			Изменение пользователя
		</div>
		<div class="uk-margin">
			<form action="{{ route('adminPanel.users.user', $user->id) }}" method="POST">
				{!! csrf_field() !!}
				<label class="uk-flex uk-flex-around">
					<div class="uk-width-1-3">
						Почта
					</div>
					<input type="email" name="email" value="{{ $user->email }}" class="uk-input uk-width-1-3 uk-margin-left">
				</label>
				<label class="uk-flex uk-flex-around">
					<div class="uk-width-1-3">
						Имя
					</div>
					<input type="text" name="name" value="{{ $user->name }}" class="uk-input uk-width-1-3 uk-margin-left">
				</label>
				<label class="uk-flex uk-flex-around">
					<div class="uk-width-1-3">
						Пароль
					</div>
					<input type="password" name="password" value="{{ $user->password }}" class="uk-input uk-width-1-3 uk-margin-left">
				</label>

				@foreach(\App\Role::getRoles() as $role)
					<label class="uk-flex uk-flex-around">
						<div class="uk-width-1-3">
							{{ trans('roles.'.$role) }}
						</div>
						<input type="checkbox" name="{{ $role }}" @if(\App\Role::userAcl($user, $role)) checked @endif class="checkbox uk-width-1-3 uk-margin-left">
					</label>
					@endforeach
					</label>
					<div class="uk-margin-large-left uk-margin-top">
						<button type="submit" class="uk-button uk-button-default">Сохранить</button>
					</div>
			</form>
			<div class="uk-margin-large-left uk-margin-top">
				<form action="{{ route('adminPanel.users.deleteUser') }}" method="POST">
					{!! csrf_field() !!}
					<input type="hidden" name="id" value="{{ $user->id }}">

					<button type="submit" class="uk-button uk-button-default" onclick="return confirm('{{ trans('messages.deleteUser?') }}')">Удалить</button>
				</form>
			</div>

		</div>
	</div>
@endsection