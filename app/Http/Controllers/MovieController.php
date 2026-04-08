<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    //
    public function index(){
        // Điều kiện: popularity > 450, vote_average > 7, giảm dần ngày phát hành 
        $movies = DB::select('SELECT * FROM movie 
                            WHERE popularity > ? 
                            AND vote_average > ?
                            ORDER BY release_date DESC LIMIT 12', [450, 7]);
        return view("movie.index", compact('movies'));
    }

    public function theloai($id)
    {
        $movies = DB::select('select * from genre g, movie_genre mg, movie m
                             where g.id = ? and g.id = mg.id_genre and mg.id_movie = m.id
                             ORDER BY m.release_date DESC LIMIT 12', [$id]);
        return view("movie.index", compact("movies"));
    }
}
