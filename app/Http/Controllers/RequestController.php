<?php

namespace App\Http\Controllers;

use App\Services\SearchService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function createRequest($id)
    {
        $request = \App\Models\Request::create(
            [
                'user_id' => Auth::id(),
                'tour_id' => $id,
            ]
        );

        if($request) {
            return back()->with('ok', 'Заявка создана успешно! В ближайшее время Вам перезвонят наши менеджеры');
        } else {
            return back()->with('error', 'Упс, что-то пошло не так!');
        }
    }

    public function requestList()
    {
        $reqs = \App\Models\Request::all();

        $array = collect();


        foreach ($reqs as $req) {
            $res = [];
            $res['id'] = $req->id;
            $res['phone'] = $req->user->phone;
            $res['tour_id'] = $req->tour->id;
            $res['created_at'] = $req->created_at->toDateString();

            $array[] = (object)$res;
        }






        return view('requests.request_list', ['data' => $array]);
    }
}
