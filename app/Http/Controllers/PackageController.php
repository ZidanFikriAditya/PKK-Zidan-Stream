<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Payment\TripayController;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index(){
        return view ('Packages.package', [
            'title' => 'Paket',
            'values' => Package::all()
        ]);
    }
    public function show($id){
        $show = Package::findOrFail($id);

        return view('Packages.viewPackage', [
            'data' => $show,
        ]);

    }

}
