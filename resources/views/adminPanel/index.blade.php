@extends('adminPanel.main')

@section('menuContent')
			<div class="uk-text-large">Статистика</div>
			 <ul class="uk-list">
			     <li>Всего пользователей - {{ $usersCount }}</li>
			 </ul>
@endsection