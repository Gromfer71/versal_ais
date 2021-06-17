@extends('layouts.app')

@section('content')
	<link rel="stylesheet" href="{{ asset('css/menu/main.css') }}">
	<div class="uk-flex uk-flex-between">
		<div class="category-wrap">
			<h3>Панель</h3>
			<ul>
				<li><a href="{{ route('adminPanel.users.index') }}">Пользователи</a></li>
				<li><a href="{{ route('adminPanel.hotels.hotels') }}">Отели</a></li>
				<li><a href="{{ route('adminPanel.tours.tours') }}">Туры</a></li>
				<li><a href="{{ route('adminPanel.options.options') }}">Дополнительные опции</a></li>
			</ul>
		</div>
		<div class="container">
			@yield('menuContent')
		</div>
	</div>

@endsection