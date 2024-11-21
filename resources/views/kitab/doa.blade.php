@extends('partials.navbar')

@section('doa')
<div class="container1">
    <h1 style="text-align: center; color: #2d2c2c; margin-bottom: 30px;">Daftar Doa Harian</h1>

    <!-- Search Bar -->
    <div style="margin-bottom: 20px; text-align: center;">
        <input type="text" id="search-bar" placeholder="Cari Doa..." style="padding: 10px; width: 80%; max-width: 500px; font-size: 16px; border: 1px solid #ddd; border-radius: 5px;">
    </div>

    <!-- Konten untuk menampilkan daftar doa -->
    <div id="doa-container" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px;">
        <!-- Data doa akan dimuat di sini -->
        <p style="text-align: center;">Memuat data...</p>
    </div>

    <script src="{{ asset('assets/js/doa.js') }}"></script>
</div>
@endsection
