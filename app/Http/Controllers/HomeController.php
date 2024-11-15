<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Definisikan variabel yang diperlukan
        $selectedKategori = 'default_value'; // Ganti dengan nilai yang sesuai

        return view('home', compact('selectedKategori')); // Kirim variabel ke view
    }
}
