<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Option;
use App\Models\Tour;
use App\Models\City;
use Illuminate\Http\Request;
use App\Services\SearchService;

class SearchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {

        if($request->isMethod('POST')) {
            $array = collect();

            if($request->get('option')) {
                $array->put('option', $request->get('option'));
            }
            if($request->get('hotel')) {
                $array->put('hotel', $request->get('hotel'));
            }
            if($request->get('city')) {
                $array->put('city', $request->get('city'));
            }


            $tours = SearchService::search($array)->filter();
        } else {
            $tours = Tour::all();
        }





        return view('search', ['tours' => $tours, 'options' => Option::all()->keyBy('id'), 'hotels' => Hotel::all()->keyBy('id'),'cities' => City::all()->keyBy('id')]);
    }
}





// TODO: сделать алгоритм поиска туров по выбранным чекбоксам.
// TODO: во вьюшку добавить поиск тура по отелям, ценам.
// TODO: сделать связывающую таблицу опций и отелей - так будет проще чем мучиться с json + преподу показать 3-ю Н.Ф.