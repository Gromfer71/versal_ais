@extends('adminPanel.main')

@section('menuContent')
	<table class="table table-hover">
		<thead>
		<th class="table__td-w1">#</th>
		<th class="table__td-w1">Город</th>
		<th class="table__td-w1">Начало</th>
		<th class="table__td-w1">Конец</th>
		<th class="table__td-w1">Цена</th>
		<th class="table__td-w1">Отель</th>
		<th class="table__td-w1">Количество людей</th>
		<th class="table__td-w1">Описание</th>
		</thead>
		<tbody>

		@foreach($tours as $tour)
			<tr>
				<td>{{ $tour->id }}</td>
				<td><a href="{{ route('adminPanel.tours.tour', $tour->id) }}" class=" uk-padding-remove">{{ $tour->city->name ?? '-' }}</a></td>
				<td>{{ $tour->dateStart }}</td>
				<td>{{ $tour->dateFinish }}</td>
				<td>{{ $tour->price }} р.</td>
				@if($tour->hotel)
				<td><a href="{{ route('adminPanel.hotels.hotel', $tour->hotel->id) }}">{{ $tour->hotel->name }}</a></td>
				@else
					<td>-</td>
				@endif
				<td>{{ $tour->num_people }}</td>
				<td>{{ $tour->describe }}</td>
			</tr>
		@endforeach
		</tbody>
	</table>
	<div>

	</div>
	<a href="{{ route('adminPanel.tours.addTour') }}">
		<button class="uk-button uk-button-default">Добавить тур</button>
	</a>
@endsection