@extends('adminPanel.main')

@section('menuContent')
	<table class="table table-hover">
		<thead>
			<th class="table__td-w1">{{ trans('words.id') }}</th>
			<th class="table__td-w1">{{ trans('words.name') }}</th>
			<th class="table__td-w1">{{ trans('words.email') }}</th>
			<th class="table__td-w1">{{ trans('words.role') }}</th>
			<th class="table__td-w1">{{ trans('words.createdAt') }}</th>
		</thead>
		<tbody>
			@foreach($users as $user)
				<tr>
					<td>{{ $user->id }}</td>
					<td><a href="{{ route('adminPanel.users.user', $user->id) }}" class=" uk-padding-remove">{{ $user->name }}</a></td>
					<td>{{ $user->email }}</td>
					<td>{{ $user->rolesToString() }}</td>
					<td>{{ $user->created_at }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<div>
		{!! $users->render() !!}
	</div>
	<a href="{{ route('adminPanel.users.addUser') }}">
		<button class="uk-button uk-button-default">Добавить пользователя</button>
	</a>

@endsection