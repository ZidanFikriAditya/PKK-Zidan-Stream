<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('afterBuying.index', [
            'title' => 'Home',
            'data' => Film::latest()->paginate(10),
        ]);
    }

    public function show($id)
    {
        $show = Film::findOrFail($id);
        $all = Film::latest()->paginate(10);

        return view('afterBuying.show', [
            'title' => 'Film',
            'show' => $show,
            'alls' => $all
        ]);
    }
}
