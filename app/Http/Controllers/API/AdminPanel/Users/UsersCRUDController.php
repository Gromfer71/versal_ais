<?php


namespace App\Http\Controllers\API\AdminPanel\Users;


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
		return json_encode(User::orderBy('id')->get());
	}

	public function addUser(Request $request)
	{
		User::create($request->all());

		return json_encode(['result' => 'success']);
	}

	public function user(Request $request, $id)
	{
		if ($request->isMethod('POST')) {
			$user = User::findorfail($id);
			if (User::where('email', $request->email)->where('id', '!=', $id)->get()->isNotEmpty()) {

				return json_encode(['result' => trans('messages.emailNotUnique')]);
			}
			$user->update($request->except('password'));
			$user->password = bcrypt($request->password);
			$user->addRoles($request->only(['admin']));
			$user->save();

			return json_encode(['result' => 'success']);
		}

		return json_encode(['user' => User::findorfail($id)]);
	}

	public function deleteUser(Request $request)
	{
		$user = User::find($request->id);

		if ($user) {
			$user->delete();

			return json_encode(['result' => 'success']);
		} else {
			return json_encode(['result' => 'error']);
		}
	}

}