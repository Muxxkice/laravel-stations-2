<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CreateMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Models\Movie;


class AdminController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        dump($movies);
        return view('admin/index', ['movies' => $movies]);
    }

    public function create()
    {
        return view('admin/create');

    }

    public function store(CreateMovieRequest $request)
    {
        $validatedData = $request->validated();
        $movie = new Movie();
        $movie->title = $validatedData["title"];
        $movie->image_url = $validatedData["image_url"];
        $movie->published_year = $validatedData["published_year"];
        $movie->is_showing = $validatedData["is_showing"];
        $movie->description = $validatedData["description"];
        $movie->save();

        // return view('admin/store');
        // return redirect()->route('admin/index');
        return redirect()->route('admin.index')->withErrors(['success' => 'Movie created successfully.']);
    }

    public function edit($id)
    {

        $movie = Movie::find($id);
        dump($movie);
        return view('admin.edit', ['movies' => $movie]);
    }

    public function update(UpdateMovieRequest $request,$id)
    {
        $movie = Movie::find($id);

        $validatedData = $request->validated();

        $movie->title = $validatedData["title"];
        $movie->image_url = $validatedData["image_url"];
        $movie->published_year = $validatedData["published_year"];
        $movie->is_showing = $validatedData["is_showing"];
        $movie->description = $validatedData["description"];
        $movie->save();

        return redirect()->route('admin.index')->withErrors(['success' => 'Movie created successfully.']);
    }

}

