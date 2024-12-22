@extends('partials.navbar')
@section('kitab')
    <style>
        .card {
            background-color: rgb(185, 195, 206);
        }
    </style>

    <div class="container mt-4">
        <div class="card-sholat">
            <div class="card-sholat">
                <h4 class="text-center">Jadwal Sholat Hari Ini</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="city-search">Cari Kota:</label>
                    <input type="text" id="city-search" class="form-control" placeholder="Masukkan nama kota...">
                    <ul id="city-list" class="list-group mt-2"></ul>
                </div>

                <div id="schedule" class="mt-4" style="display: none;">
                    <h4>Jadwal Sholat untuk
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor"
                        class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                        <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
                    </svg><span id="city-name"></span></h4>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Imsak
                            <span id="imsak" class="badge text-bg-primary rounded-pill">N/A</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Subuh
                            <span id="subuh" class="badge text-bg-primary rounded-pill">N/A</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Dzuhur
                            <span id="dzuhur" class="badge text-bg-primary rounded-pill">N/A</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Ashar
                            <span id="ashar" class="badge text-bg-primary rounded-pill">N/A</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Maghrib
                            <span id="maghrib" class="badge text-bg-primary rounded-pill">N/A</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Isya
                            <span id="isya" class="badge text-bg-primary rounded-pill">N/A</span>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>

    <div class="row mt-4">
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">AL-Quran</h5>
              <p class="card-text">Baca Alquran Disini.</p>
              <a href="{{ route('kitab.surah') }}" class="btn btn-primary">Pelajari AL-Quran disini</a>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Hadits</h5>
              <p class="card-text">Pelajari Hadits Disini.</p>
              <a href="{{ route('hadith') }}" class="btn btn-primary">Pelajari Hadits disini</a>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Doa Harian</h5>
                <p class="card-text">Pelajari Hadits Disini.</p>
                <a href="{{ route('kitab.doa') }}" class="btn btn-primary">Pelajari Doa Harian disini</a>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Kalkulator Zakat</h5>
                <p class="card-text">Pelajari Kalkulator Zakat Disini.</p>
                <a href="{{ route('kitab.kalkulator') }}" class="btn btn-primary">Buka Kalkulator Zakat disini</a>
              </div>
            </div>
          </div>
      </div>
      <script src="{{ asset('assets/js/jadwal-sholat.js') }}"></script>
@endsection
