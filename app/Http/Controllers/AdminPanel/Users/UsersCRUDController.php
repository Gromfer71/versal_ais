<?php


namespace App\Http\Controllers\AdminPanel\Users;


use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UsersCRUDController extends Controller
{
	public function __construct()
	{
		$this->middleware(['admin', 'auth']);
	}

	public function users()
	{
		return view('adminPanel.users.users', ['users' => User::orderBy('id')->paginate(10)]);
	}

	public function addUser(Request $request)
	{
		if ($request->isMethod('POST')) {
			User::create($request->all());

			return redirect()->route('adminPanel.users.index')->with('ok', trans('messages.userCreated'));
		}

		return view('adminPanel.users.addUser');
	}

	public function user(Request $request, $id)
	{
		if ($request->isMethod('POST')) {
			$user = User::findorfail($id);
			if (User::where('email', $request->email)->where('id', '!=', $id)->get()->isNotEmpty()) {
				return back()->with('error', trans('messages.emailNotUnique'));
			}
			$user->update($request->except('password'));
			$user->password = bcrypt($request->password);
			$user->addRoles($request->only(['admin']));
			$user->save();

			return redirect()->route('adminPanel.users.user', $id)->with('ok', trans('messages.userUpdated'));
		}

		return view('adminPanel.users.user', ['user' => User::findorfail($id)]);
	}

	public function deleteUser(Request $request)
	{
		$user = User::find($request->id);

		if ($user) {
			$user->delete();

			return redirect()->route('adminPanel.users.index')->with('ok', trans('messages.userDeleted'));
		} else {
			return back()->with('error', trans('messages.somethingWrong'));
		}
	}

}