@extends('adminPanel.main')

@section('menuContent')
	<table class="table table-hover">
		<thead>
		<th class="table__td-w1">Номер</th>
		<th class="table__td-w1">Название</th>
		<th class="table__td-w1">Рейтинг</th>
		<th class="table__td-w1">Опции</th>
		<th class="table__td-w1">Описание</th>
		</thead>
		<tbody>

		@foreach($hotels as $hotel)

			<tr>
				<td>{{ $hotel->id }}</td>
				<td><a href="{{ route('adminPanel.hotels.hotel', $hotel->id) }}" class=" uk-padding-remove">{{ $hotel->name }}</a></td>
				<td>{{ $hotel->rating }}</td>
				<td>{{ implode(',', $hotel->options->pluck('name')->toArray()) }}</td>
				<td>{{ $hotel->describe }}</td>

			</tr>
		@endforeach
		</tbody>
	</table>
	<div>


	</div>
	<a href="{{ route('adminPanel.hotels.addHotel') }}">
		<button class="uk-button uk-button-default">Добавить отель</button>
	</a>
@endsection