<?php

namespace App\Http\Controllers\AdminPanel\Hotels;

use App\Models\Hotel;
use App\Models\HotelToOption;
use App\Models\Option;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class HotelCRUDController extends Controller
{
    public function __construct()
    {

        $this->middleware(['admin', 'auth']);
    }

    public function hotels()
    {
        $hotels = Hotel::all();
        foreach ($hotels as $hotel) {
            $hotel->describe = mb_substr($hotel->describe, 0, 30);
        }

        return view('adminPanel.hotels.hotels', ['hotels' => $hotels]);
    }

    public function hotel(Request $request, $id)
    {
        $hotel = Hotel::find($id);
        if (!$hotel) {
            return back();
        }
        $options = Option::all();

        if ($request->isMethod('POST')) {
            $hotel->update($request->except('options'));
            $hotel->options()->detach();
            $hotel->options()->attach($request->get('options'));
            $hotel->save();

            return back()->with('ok', 'Успешно');
        }

        return view('adminPanel.hotels.hotel', ['hotel' => $hotel, 'options' => $options]);
    }

    public function addHotel(Request $request)
    {
        $options = Option::all();
        if ($request->isMethod('POST')) {
            $hotel = Hotel::create($request->except('options'));
            $hotel->options()->attach($request->get('options'));
            $hotel->save();

            return redirect()->route('adminPanel.hotels.hotels')->with('ok', 'Успешно');
        }

        return view('adminPanel.hotels.addHotel', ['options' => $options]);
    }

    public function deleteHotel(Request $request)
    {
        $hotel = Hotel::find($request->id);
        if (!$hotel) {
            return redirect()->route('adminPanel.hotels.hotels')->with('ok', 'Отель не найден');
        }

        $hotel->delete();

        return redirect()->route('adminPanel.hotels.hotels')->with('ok', 'Отель удален');
    }

}
