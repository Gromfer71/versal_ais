<?php


namespace App\Services;


use App\Models\Tour;
use Illuminate\Http\Request;

class SearchService
{

    public static  function escape($str)
    {
        $str = str_replace('\\', '', $str);
        $str = str_replace('"', "'", $str);

        return $str;
    }

    public static function search($request)
    {

        $tours = Tour::all();

            foreach ($tours as $tourKey => $tour) {
                if($request->get('city')) {
                    $tours = $tours->filter(function ($item) use ($request) {
                        if(in_array($item->city->id, array_keys($request->get('city')))) {
                            return $item;
                        }
                    });
                }

                if($request->get('option')) {
                    foreach ((array)$request->get('option') as $key => $option) {
                        if (!in_array($option, $tour->hotel->options->pluck('id')->toArray())) {
                            $tours->forget($tourKey);
                        }
                    }
                }

                if($request->get('hotel')) {
                    $tours = $tours->filter(function ($item) use ($request) {
                        if(in_array($item->hotel->id, array_keys($request->get('hotel')))) {
                            return $item;
                        }
                    });
                }
                
        }

        return $tours;
    }
}