<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrayerScheduleController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function getSchedule($id)
    {
        $apiUrl = "https://api.myquran.com/v2/sholat/kota/{$id}";
        $response = file_get_contents($apiUrl);
        $schedule = json_decode($response, true);

        return view('home', ['prayerSchedule' => $schedule]);
    }
}
