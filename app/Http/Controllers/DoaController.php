<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class DoaController extends Controller
{
    public function doa()
{

    // Kirim data ke view
    return view('kitab.doa');
}

}
