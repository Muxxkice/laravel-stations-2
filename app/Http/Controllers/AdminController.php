<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movies;
class AdminController extends Controller
{
    public function index()
    {
        $movies = Movies::all();
        return view('admin/index', ['movies' => $movies]);
    }
}
