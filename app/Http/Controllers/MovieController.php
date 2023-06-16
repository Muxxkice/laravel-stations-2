<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Sheet;
use App\Models\Genre;
use App\Models\Schedule;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        $query= Movie::with('genre');

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

        return view('movies.index', ['movies' => $movies]);
    }

    public function sheets()
    {
        $sheets = Sheet::all();
        $count = Sheet::count();
        dump($sheets);
        dump($count);

        return view('movies/sheets', ['sheets' => $sheets]);
    }

    public function show($id)
    {
        $movie = Movie::with('genre')->find($id);
        $schedules = Schedule::where('movie_id', $id)->orderBy('created_at', 'desc')->get();
        dump($schedules);

        return view('movies.show', ['movie' => $movie,'schedules'=>$schedules]);
    }
}
