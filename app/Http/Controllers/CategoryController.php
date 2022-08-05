<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Film;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    private $no = 'null';

    public function index()
    {
        $categories = DB::table('categories')->latest()->get();
        return view('category.insert', compact('categories'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string'
        ]);
        Category::create([
            'name' => $request->name
        ]);
        return back()->with('bisa', 'Category sukses di tambah');
    }

    public function destroy($id)
    {
        // $select = Category::all()->pluck('id')->first();
        // $select2 = Category::latest()->pluck('id')->first();
        $categories = Category::findOrFail($id);
        if(boolval(Film::where('category_id', $id)->first())){

            $film = Film::where('category_id', $id)->first();
            $film->delete();
        }
        $categories->delete();

        return back()->with('bisa', 'Hapus category ' . $categories->name . ' berhasil, film anda yang tergabung dengan kategori ini akan ikut terhapus');
    }
}
