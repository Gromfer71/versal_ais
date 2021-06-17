@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class=" uk-text-center uk-text-large">Маршруты</div>
                <div class="panel-body">
{{--					{{ dd($routes) }}--}}
	                <table class="table table-hover">
		                <thead>
		                <th class="table__td-w1">URI</th>
		                <th class="table__td-w1">Методы</th>
		                <th class="table__td-w1">Посредники</th>
		                <th class="table__td-w1">Название</th>

		                </thead>
		                <tbody>
		                @foreach($routes as $route)
			                <tr>
				                <td>{{ $route->uri() }}</td>
				                <td>{{ implode(', ', $route->methods()) }}</td>
				                <td>{{ implode(', ', $route->gatherMiddleware()) }}</td>
				                <td>{{ $route->getName() ?? '-' }}</td>
			                </tr>
		                @endforeach
		                </tbody>
	                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
