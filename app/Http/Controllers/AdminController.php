<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use DB;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CreateMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Models\Movie;
use App\Models\Genre;

class AdminController extends Controller
{
    public function index(Request $request)
    {

        $movies = Movie::with('genre');
        // $genres = Genre::all();
        $search_word = $request['search_word'];
        $is_showing = $request['is_showing'];
        if ($search_word !== null) {
            // 全角を半角に
            $search_split = mb_convert_kana($search_word,'s');
            // カンマまたは " ", \r, \t, \n , \f などの空白文字で句を分割する。
            $search_split = preg_split("/[\s,]+/", $search_split);
            foreach($search_split as $value){
                $movies->where('title','description','like','%'.$value.'%');
            };
        };
        if ($is_showing !== null) {
            $movies->where('is_showing', $is_showing);
        }

        dump($movies);
        $movies = $movies->paginate(20);


        return view('admin/index', ['movies' => $movies,]);
    }

    public function create()
    {
        return view('admin/create');

    }

    public function store(CreateMovieRequest $request)
    {
        $validatedData = $request->validated();

        DB::transaction(function () use ($validatedData){

        $movie = new Movie();
        $genre = Genre::firstOrCreate(['name' => $validatedData['genre']]);

        $movie->title = $validatedData["title"];
        $movie->image_url = $validatedData["image_url"];
        $movie->published_year = $validatedData["published_year"];
        $movie->is_showing = $validatedData["is_showing"];

        $movie->description = $validatedData["description"];
        $movie->genre_id = $genre->id;
        $movie->save();

        });

        return redirect()->route('admin.index')->with('success', 'Movie created successfully.');
    }

    public function edit($id)
    {

        $movie = Movie::with('genre')->find($id);

        return view('admin.edit', ['movie' => $movie]);
    }

    public function update(UpdateMovieRequest $request,$id)
    {

        DB::transaction(function () use ($request,$id){

            $validatedData = $request->validated();
            $movie = Movie::with('genre')->find($id);
            $genre = Genre::firstOrCreate(['name' => $validatedData['genre']]);

            $movie->title = $validatedData["title"];
            $movie->image_url = $validatedData["image_url"];
            $movie->published_year = $validatedData["published_year"];
            $movie->is_showing = $validatedData["is_showing"];

            $movie->description = $validatedData["description"];
            $movie->genre_id = $genre->id;
            $movie->save();

            });

        return redirect()->route('admin.index')->withErrors(['success' => 'Movie created successfully.']);
    }

    public function destroy($id)
    {

        $movie = Movie::find($id);

        if ($movie) {
            $movie->delete();
            return redirect()->route('admin.index')->withErrors(['success' => 'Movie deleted successfully.']);
        } else {
            return abort(404);
        }
    }

}

