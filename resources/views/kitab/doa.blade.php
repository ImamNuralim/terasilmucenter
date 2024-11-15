@extends('partials.navbar')
@section('doa')
<div class="container1">
    <h1 style="text-align: center; color: #2d2c2c; margin-bottom: 30px;">Daftar Doa Harian</h1>

    <!-- Konten untuk menampilkan daftar doa -->
    <div id="doa-container" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px;">
        <!-- Data doa akan dimuat di sini -->
        <p style="text-align: center;">Memuat data...</p>
    </div>

    <script src="{{ asset('assets/js/doa.js') }}"></script>
</div>
@endsection
