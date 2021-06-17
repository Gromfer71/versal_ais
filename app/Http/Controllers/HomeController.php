<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $app = app();
	    $routes = $app->routes->getRoutes();
        return view('home', ['routes' => $routes]);
    }

    public function profile(Request $request)
    {
        return view('profile.profile', ['user' => Auth::user()]);
    }

    public function changePhone(Request $request)
    {
        $user = Auth::user();
        $user->phone = $request->get('phone');
        $user->save();

        return back()->with('ok', 'Телефон успешно изменен');
    }

    public function changePassword(Request $request)
    {
        $user = Auth::user();
        $user->password = bcrypt($request->get('password'));
        $user->save();

        return back()->with('ok', 'Пароль успешно изменен');
    }


}
