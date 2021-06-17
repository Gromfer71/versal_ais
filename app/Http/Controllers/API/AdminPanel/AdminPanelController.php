<?php


namespace App\Http\Controllers\API\AdminPanel;


use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class AdminPanelController extends Controller
{
	public function __construct()
	{
		$this->middleware(['admin', 'auth']);
	}

	public function index()
	{
		return view('adminPanel.index', ['usersCount' => User::count()]);
	}
}