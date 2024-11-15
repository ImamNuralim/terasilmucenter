<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KalkulatorController extends Controller
{
    public function kalkulator()
    {
        return view('kitab.kalkulator');
}
}
