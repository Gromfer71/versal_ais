@extends('adminPanel.main')

@section('menuContent')
	<table class="table table-hover">
		<thead>
			<th class="table__td-w1">{{ trans('words.id') }}</th>
			<th class="table__td-w1">{{ trans('words.name') }}</th>
			<th class="table__td-w1">{{ trans('words.price') }}</th>
			<th class="table__td-w1">{{ trans('words.icon') }}</th>
		</thead>
		<tbody>
		@foreach($options as $option)
			<tr>
				<td>{{ $option->id }}</td>
				<td><a href="{{ route('adminPanel.options.option', $option->id) }}" class=" uk-padding-remove">{{ $option->name }}</a></td>
				<td>{{ $option->getPrice() }}</td>
				<td><img src="{{ asset($option->getIconPath()) }}" alt="icon"></td>

			</tr>
		@endforeach
		</tbody>
	</table>
	<div>
		{!! $options->render() !!}
	</div>
	<a href="{{ route('adminPanel.options.addOption') }}">
		<button class="uk-button uk-button-default">Добавить опцию</button>
	</a>
@endsection