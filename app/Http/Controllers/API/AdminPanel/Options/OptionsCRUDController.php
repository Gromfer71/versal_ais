<?php

namespace App\Http\Controllers\API\AdminPanel\Options;

use App\Models\Option;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class OptionsCRUDController extends Controller
{
	public function __construct()
	{
		$this->middleware(['admin', 'auth']);
	}

	public function options()
	{
		return json_encode(Option::all());
	}

	public function addOption(Request $request)
	{

		if ($request->isMethod('POST')) {
			Option::create($request->all());

			return redirect()->route('adminPanel.options.options')->with('ok', trans('messages.optionCreated'));
		}

		return view('adminPanel.options.addOption');
	}

	public function option(Request $request, $id)
	{

		$option = Option::find($id);
		$options = \App\Models\Option::all();

		if(!$option) {
			return back();
		}

		if ($request->isMethod('POST')) {
			$option->update($request->all());

			return redirect()->route('adminPanel.options.option', $id)->with('ok', trans('messages.optionUpdated'));
		}

		return view('adminPanel.options.option', ['option' => $option]);
	}

	public function deleteOption(Request $request)
	{
		if ($option = Option::find($request->id)) {
			$option->delete();

			return redirect()->route('adminPanel.options.options')->with('ok', trans('messages.optionDeleted'));
		} else {
			return back()->with('error', trans('messages.somethingWrong'));
		}
	}
}
