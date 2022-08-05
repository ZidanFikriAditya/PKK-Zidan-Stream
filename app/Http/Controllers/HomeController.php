<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Transaction;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $status = Transaction::where('user_id', auth()->user()->id)->pluck('status')->first();
        $admin = auth()->user()->level_user;

        if ($status == 'paid' || $admin == 'admin'){
            return view('afterBuying.index', [
                'title' => 'Home',
                'data' => Film::latest()->paginate(10),
            ]);
        }else{
            return response()->json([
                'message' => 'Anda Harus Berlangganan ya kawan'
            ]);
        }
        
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
