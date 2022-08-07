<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Film;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $status = Transaction::where('user_id', auth()->user()->id)->pluck('status')->first();
        $admin = auth()->user()->level_user;
        $category = DB::table('categories')->get();


        if ($status == 'paid' || $admin == 'admin'){
            return view('afterBuying.index', [
                'title' => 'Home',
                'data' => Film::latest()->paginate(10),
                'category' => $category
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
            'alls' => $all,
        ]);
    }

    public function see($id)
    {
        $categories = Category::all();
        $film = Film::where('category_id', $id)->paginate(10);

        return view('afterBuying.byCategory', [
            'title' => 'Home',
            'categories' => $categories,
            'film' => $film
        ]);
    }
}
