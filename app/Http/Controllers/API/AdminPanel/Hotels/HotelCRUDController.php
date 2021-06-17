<?php

namespace App\Http\Controllers\API\AdminPanel\Hotels;

use App\Models\Hotel;
use App\Models\Option;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HotelCRUDController extends Controller
{
	public function __construct()
	{
		$this->middleware(['admin', 'auth']);
	}

	public function hotels()
	{
		$hotels = Hotel::all();

		return json_encode($hotels);
	}

	public function hotel(Request $request, $id)
	{
		$hotel = Hotel::find($id);
		if(!$hotel) {
			return back();
		}
		$hotelOptions = Option::findmany(json_decode($hotel->options))->pluck('id');
		$options = Option::all();

		$hotel->options = implode(',', collect(json_decode($hotel->options))->toArray());


		if($request->isMethod('POST')) {
			$hotel->update($request->except('options'));
			$hotel->options = json_encode(collect($request->get('options')));
			$hotel->save();

			return back()->with('ok', 'Успешно');
		}

		return view('adminPanel.hotels.hotel', ['hotel' => $hotel, 'options' => $options, 'hotelOptions' => $hotelOptions]);
	}

	public function addHotel(Request $request)
	{
		$options = Option::all();
		if($request->isMethod('POST')) {
			$hotel = Hotel::create($request->except('options'));
			$hotelOptions = $request->get('options');

			$hotel->options = json_encode($hotelOptions);
			$hotel->save();

			return redirect()->route('adminPanel.hotels.hotels')->with('ok', 'Успешно');
		}

		return view('adminPanel.hotels.addHotel', ['options' => $options]);
	}

	public function deleteHotel(Request $request)
	{
		$hotel = Hotel::find($request->id);
		if(!$hotel) {
			return redirect()->route('adminPanel.hotels.hotels')->with('ok', 'Отель не найден');
		}

		$hotel->delete();

		return redirect()->route('adminPanel.hotels.hotels')->with('ok', 'Отель удален');
	}

}
