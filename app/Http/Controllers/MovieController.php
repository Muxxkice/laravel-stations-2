<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
class MovieController extends Controller
{
    public function index(Request $request)
    {
        $query= Movie::query();

        $keyword = $request['keyword'];
        $is_showing = $request['is_showing'];
        if ($keyword !== null) {
            // 全角を半角に
            $search_split = mb_convert_kana($keyword,'s');
            // カンマまたは " ", \r, \t, \n , \f などの空白文字で句を分割する。
            $search_split = preg_split("/[\s,]+/", $search_split);
            // dump($search_split);
            foreach($search_split as $value){
                $query->where('title','like','%'.$value.'%')
                      ->orWhere('description','like','%'.$value.'%');
            };
        };
        if ($is_showing !== null) {
            $query->where('is_showing', $is_showing);
        }

        $movies = $query->paginate(20);

        return view('movie/index', ['movies' => $movies]);
    }
}
