<?php

namespace App\Http\Controllers;

use App\Praktikum;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show index page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $praktikums = Praktikum::all();

        return view('mahasiswa.index', compact('praktikums'));
    }
}
