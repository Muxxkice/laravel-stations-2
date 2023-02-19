<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movies;
class MovieController extends Controller
{
    public function index()
    {
        $movies = Movies::all();
        return view('movie/index', ['movies' => $movies]);
    }
}
