<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailMovieController extends Controller
{
    
    public function chitiet($id)
    {
        $movies = DB::table('movie')->where('id', $id)->first();
        return view("movie.chitiet", compact("movies"));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $movies = DB::select("SELECT * from movie where movie_name_vn like ?", ["%".$keyword."%"]);
        return view('movie.search_results', compact('movies'));
    }

    
}