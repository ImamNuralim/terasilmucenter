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
    public function jadwalSholat()
    {
        // Default tanpa data jadwal sholat
        return view('home', ['prayerSchedule' => null]);
    }

    public function getSchedule($id)
    {
        $apiUrl = "https://api.myquran.com/v2/sholat/kota/{$id}";
        $response = file_get_contents($apiUrl);
        $schedule = json_decode($response, true);

        return view('home', ['prayerSchedule' => $schedule]);
    }
}
