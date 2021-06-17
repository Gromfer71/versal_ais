<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->

    <link href="/css/app.css" rel="stylesheet">


	<link href="{{ asset('ulkit/css/uikit.min.css') }}" rel="stylesheet">
	<script src="{{ asset('ulkit/js/uikit.min.js') }}"></script>
	<script src="https://cdn.jsdelivr.net/npm/uikit@3.6.13/dist/js/uikit-icons.min.js"></script>

    <link href="https://cdn.fancygrid.com/fancy.min.css" rel="stylesheet">
    <script src="https://cdn.fancygrid.com/fancy.min.js"></script>

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top" height="10">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    
                    <a  @auth href="{{ route('search') }}" @guest href="{{ url('/') }}" @endguest>
                        <img    src="{{ asset('img/logo.jpg') }}" height="10%">
                    </a> 
                    
                    
                    
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            
                            <li><a style=" font-style: normal; font-weight: 500; font-size: 21px; line-height: 60px; color: #000000;" href="{{ url('/login') }}">Войти</a></li>
                            <li><a style=" font-style: normal; font-weight: 400; font-size: 21px; line-height: 60px; color: #000000; text-align: center;" href="{{ url('/register') }}">Регистрация</a></li>
                        @else
                           
	                        @if(\App\Role::acl(\App\Role::ADMIN))
	                        
								<li class="uk-position-right">
									<div class="navbar-brand">
									     <li class="dropdown">
                                <a style=" font-style: normal; font-weight: 400; font-size: 21px; line-height: 80px; color: #000000; text-align: center;" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a style=" font-style: normal; font-weight: 400; font-size: 16px; line-height: 60px; color: #000000; text-align: center;" href="{{ route('profile') }}" >Личный кабинет</a>
                                        <a style="font-style: normal; font-weight: 400; font-size: 16px; line-height: 60px; color: #000000; text-align: center;" href="{{ route('request_list') }}" >Список активных заявок (для менеджеров)</a>
										<a style=" font-style: normal; font-weight: 400; font-size: 16px; line-height: 60px; color: #000000; text-align: center;" href="{{ route('adminPanel.index') }}" >Админ панель</a>
										<a style=" font-style: normal; font-weight: 400; font-size: 16px; line-height: 60px; color: #000000; text-align: center;" href="{{ route('home') }}" >Маршруты</a>
                                        <a style=" font-style: normal; font-weight: 400; font-size: 16px; line-height: 60px; color: #000000; text-align: center;" href="{{ route('home') }}" href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Выйти
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                    
                                </ul>
                            </li>
                                        
									</div>
								</li>
							@endif
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
	    @if(session('ok'))
		    <script>
			    UIkit.notification({message: "{{ session('ok') }}" ,pos: 'top-center', status: 'success'})
		    </script>
	    @endif
	    @if(session('error'))
		    <script>
			    UIkit.notification({message: "{{ session('error') }}", pos: 'top-center', status: 'danger'})
		    </script>
	    @endif
	    @if($errors->any())
		    <script>
			    UIkit.notification({message: '{!! $errors->first() !!}', pos: 'top-center', status: 'danger'})
		    </script>
	    @endif
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
