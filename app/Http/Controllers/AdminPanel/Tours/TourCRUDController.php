<?php

namespace App\Http\Controllers\AdminPanel\Tours;

use App\Models\City;
use App\Models\Hotel;
use App\Models\Option;
use App\Models\Tour;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TourCRUDController extends Controller
{
	public function __construct()
	{
		$this->middleware(['admin', 'auth']);
	}

	public function tours()
	{
		$tours = Tour::all();
		foreach ($tours as $tour) {
			$tour->describe = substr($tour->describe, 0, 30);
		}
		return view('adminPanel.tours.tours', ['tours' => $tours]);
	}

	public function tour(Request $request, $id)
	{
		$tour = Tour::find($id);
		if(!$tour) {
			return back();
		}
		if($request->isMethod('POST')) {

			if($request->get('dateFinish') < $request->get('dateStart'))  {
				return back()->with('error', 'Дата окончания должна быть позже даты начала тура!');
			}
			$tour->update($request->all());
			$tour->save();

			return back()->with('ok', 'Успешно');
		}

		return view('adminPanel.tours.tour', ['tour' => $tour, 'cities' => City::all(), 'hotels' => Hotel::all()]);
	}

	public function addTour(Request $request)
	{
		if($request->isMethod('POST')) {
			return redirect()->route('adminPanel.tours.tour', Tour::create($request->all())->id)->with('ok', 'Тур создан успешно');
		}

		return view('adminPanel.tours.addTour', ['cities' => City::all(), 'hotels' => Hotel::all()]);
	}

	public function deleteTour(Request $request)
	{
		$tour = Tour::find($request->id);
		if(!$tour) {
			return back()->with('ok', 'Отель не найден');
		}

		$tour->delete();

		return redirect()->route('adminPanel.tours.tours');
	}
}
