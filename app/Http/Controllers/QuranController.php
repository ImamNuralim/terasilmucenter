<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class QuranController extends Controller
{
    public function quran()
    {
        return view('kitab.surah');
}
}
