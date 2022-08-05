<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeFilmRequest;
use App\Http\Requests\updateFilmRequest;
use App\Models\Category;
use App\Models\Film;
use App\Models\User;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FilmController extends Controller
{
    public function index()
    {
        return view('Film.editFilm', [
            'title' => 'Edit Film',
            'dtFilm' => Film::latest()->get(),
            'id_ctg' => Category::all()
        ]);
    }
    
    public function show($id)
    {
        $show = Film::findOrFail($id);

        return view('Film.updateFilm', [
            'title' => 'Update',
            'show' => $show,
            'id_ctg' => DB::table('categories')->get()
        ]);
    }
    
    public function store(storeFilmRequest $request)
    {
        // Original Name
        // $name = $request->file('film')->getClientOriginalName();
        //Ekstensi
        $extension = $request->file('film')->getClientOriginalExtension();
        // modifikasi
        $nameMod = 'VID' . '_' . time() . '.' . $extension;
        
        $durasi = $request->durasi . ':' . $request->durasi2 . ':' . $request->durasi3;
        
        //Ekstensi
        $ekstensi = $request->file('thumbnail')->getClientOriginalExtension();
        // modifikasi
        $thumbnail = 'IMG' . '_' . time() . '.' . $ekstensi; 

        Film::create([
            'category_id' => $request->id_category,
            'title' => $request->title,
            'description' => $request->description,
            'film' => $nameMod,
            'thumbnail' => $thumbnail,
            'durasi' => $durasi,
        ]);
        //store
        $request->file('film')->storeAs('film', $nameMod);
        $request->file('thumbnail')->storeAs('thumbnail', $thumbnail);
        
        return back()->with('bisa', 'Film sukses ditambah !');
    }
    
    public function see()
    {
        $films = Film::latest()->paginate(10);
        return view('Film.read', compact('films'), [
            'title' => 'Read And Update',
        ]);
    }
    
    public function update(updateFilmRequest $request, $id)
    {
        $extension = $request->file('film')->getClientOriginalExtension();
        // modifikasi
        $nameMod = 'IMG' . '_' . time() . '.' . $extension;
         //Ekstensi
         $ekstensi = $request->file('thumbnail')->getClientOriginalExtension();
         // modifikasi
         $thumbnail = 'IMG' . '_' . time() . '.' . $ekstensi;
        
        $film = Film::findOrFail($id);
        $film->title = $request->title;
        $film->description = $request->description;
        if ($request->file('film')){
            if($request->oldFilm){
                Storage::delete('film/' . $request->oldFilm);
            }        
            $film->film = $nameMod;
        }
        if ($request->file('thumbnail')){
            if ($request->oldThumb){
                Storage::delete('thumbnail/' . $request->oldThumb);
            }
            $film->thumbnail = $thumbnail;
        }
        $film->durasi = $request->durasi;
        $film->update();

        $request->file('film')->storeAs('film', $nameMod);
        $request->file('thumbnail')->storeAs('thumbnail', $thumbnail);

        return redirect('/show')->with('bisa', 'Berhasil Di update');
    }

    public function destroy($id)
    {
        $delete = Film::findOrFail($id);
        Storage::delete('film/' . $delete->film);
        Storage::delete('thumbanail/' . $delete->thumbnail);
        $delete->delete();

        return back()->with('bisa', 'Data film berhasil dihapus');

    }
    
}
