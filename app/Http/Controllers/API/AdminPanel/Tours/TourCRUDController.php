<?php

namespace App\Http\Controllers\API\AdminPanel\Tours;

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
		return json_encode($tours);
	}

	public function tour(Request $request, $id)
	{
		$hotel = Hotel::find($id);
		if(!$hotel) {
			return json_encode('error');
		}
		$hotelOptions = Option::findmany(json_decode($hotel->options))->pluck('id');
		$options = Option::all();

		$hotel->options = implode(',', collect(json_decode($hotel->options))->toArray());


		if($request->isMethod('POST')) {
			$hotel->update($request->except('options'));
			$hotel->options = json_encode(collect($request->get('options')));
			$hotel->save();

			return json_encode('success');
		}

		return json_encode(['hotel' => $hotel, 'options' => $options, 'hotelOptions' => $hotelOptions]);
	}

	public function addTour(Request $request)
	{
		$hotel = Hotel::create($request->all());

		return json_encode('success');
	}

	public function deleteTour(Request $request)
	{
		$hotel = Hotel::find($request->id);
		if(!$hotel) {
			return json_encode('error');
		}

		$hotel->delete();

		return json_encode('success');
	}
}
