@extends('partials.navbar')
@section('home')

    <head>
        <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">

    </head>
    <style>
        /* Style untuk form-control saat hover */
        .form-control:hover {
            border-color: #007bff;
            /* Warna border saat hover */
            box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.25);
            cursor: pointer;
            /* Bayangan border saat hover */
        }
        .kategori{
            position: sticky;
            top: 70px;
            z-index: 1000;
        }

        /* Style untuk SVG saat hover */
        svg:hover {
            stroke: #007bff;
            /* Warna stroke SVG saat hover */
            cursor: pointer;
            /* Mengubah cursor menjadi pointer */
            color: #577bff;
        }

        .success-floating {
            position: fixed;
            transform: translate(-50%, -50%);
            z-index: 1050;
            width: 35vh;
            top: 50%;
            left: 50%;
            background-color: #e3f9ff;
            border-radius: 10px;
        }

        .error-floating {
            position: fixed;
            transform: translate(-50%, -50%);
            z-index: 1050;
            width: 35vh;
            top: 50%;
            left: 50%;
            background-color: #ffe3e3;
            border-radius: 10px;
        }

        .kategori .active {
            font-weight: bold;
            color: blue;
        }

        .swal2-success-circular-line-right {
            background-color: unset !important;
        }

        .swal2-success-circular-line-left {
            background-color: unset !important;
        }

        .swal2-success-fix {
            background-color: unset !important;
        }

        html {
            scroll-behavior: smooth;
        }

        .kategori .active {
            font-weight: bold;
            color: blue;
        }

        .swal2-success-circular-line-right {
            background-color: unset !important;
        }

        .swal2-success-circular-line-left {
            background-color: unset !important;
        }

        .swal2-success-fix {
            background-color: unset !important;
        }

        .sticky {
            position: -webkit-sticky;
            /* Safari */
            position: sticky;
            top: 70px;
            /* Menjaga posisi di atas saat diskroll */
            z-index: 1000;
        }

        .list-group-item {
            padding: 5px 10px;
            /* Sesuaikan padding sesuai kebutuhan */
            margin-bottom: 0;
        }

        .dropdown-toggle {
            display: none;
        }

        @media (max-width: 766px) {
            .d-lg-none{
                margin-top: 25px
            }
            .dropdown1 {
                position: relative;
    z-index: 1050; /* Agar berada di atas elemen lainnya */
    margin-top: -22px;
    margin-bottom: 5px;
            }

            .dropdown-toggle {
                display: block;
            }

            .sort-list {
                display: none;
            }

            .dropdown-menu {
                position: absolute;
    top: 100%;
    left: 0;
    z-index: 1050;
    padding: 5px 0;
    width: 150px;
    font-size: 14px;
            }

            .dropdown-menu li {

                /* jarak antar item */
                cursor: pointer;
            }

            .dropdown-toggle {
                /* hanya muncul di layar kecil */
                padding: 5px 10px;
                /* jarak atas-bawah */
                font-size: 14px;
                /* ukuran teks dropdown */
                width: 150px;
                /* lebar dropdown */
                text-align: center;
                background-color: #4299E1;
                /* warna latar belakang */
                border: 1px solid #ddd;
                /* border */
                border-radius: 5px;
                /* rounded corners */
            }
        }
    </style>

    @if (session('success'))
        <div id="success-message" data-message="{{ session('success') }}"></div>
    @endif

    @if ($errors->any())
        <div id="error-messages" data-errors='@json($errors->all())'></div>
    @endif

    <body>
        <div class="container mt-3">
            <div class="row">
                <div class="col-lg-2 kategori" >
                    <div class="d-flex justify-content-between align-items-center" style="margin-top: 1vh!important;">
                        <h3>Kategori</h3>
                        @if ($selectedKategori)
                            <a href="{{ route(auth()->user()->role . '.homekategori') }}"
                                class="badge bg-danger ms-2">Reset</a>
                        @endif
                    </div>

                    <ul class="list-unstyled">
                        @foreach (['Aqidah', 'Fiqih', 'Sirah', 'Lainnya'] as $kategori)
                            <li style="padding:2px;">
                                <a href="{{ route(auth()->user()->role . '.homekategori', $kategori) }}"
                                    class="{{ $selectedKategori === $kategori ? 'active' : '' }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-category">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M4 4h6v6h-6z" />
                                        <path d="M14 4h6v6h-6z" />
                                        <path d="M4 14h6v6h-6z" />
                                        <path d="M17 17m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                                    </svg>
                                    {{ $kategori }}
                                </a>
                            </li>
                        @endforeach
                    </ul>

                    <div class="d-flex justify-content-between align-items-center" style="margin-top: 1vh!important;">
                        <h3>Urutkan</h3>
                        @if (request('sort'))
                            <a href="{{ route(auth()->user()->role . '.homekategori', ['kategori' => $selectedKategori]) }}"
                                class="badge bg-danger ms-2">Reset</a>
                        @endif
                    </div>
                    <ul class="list-unstyled">
                        @foreach ([
            'newest' => 'Terbaru',
            'upvotes' => 'Up Votes Terbanyak',
            'downvotes' => 'Down Votes Terbanyak',
            'oldest' => 'Terlama',
        ] as $sortKey => $sortLabel)
                            <li style="padding:2px;">
                                <a href="{{ route(auth()->user()->role . '.homekategori', ['sort' => $sortKey, 'kategori' => $selectedKategori]) }}"
                                    class="{{ request('sort') === $sortKey ? 'active' : '' }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-category">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M4 4h6v6h-6z" />
                                        <path d="M14 4h6v6h-6z" />
                                        <path d="M4 14h6v6h-6z" />
                                        <path d="M17 17m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                                    </svg>
                                    {{ $sortLabel }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <a href="https://terasilmucenter.site/" style="text-decoration: none; list-style-type: disc;  margin-left: 5px; margin-top: auto; position: absolute; bottom: 15px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 56 56"><path fill="currentColor" d="M28 51.906c13.055 0 23.906-10.828 23.906-23.906c0-13.055-10.875-23.906-23.93-23.906C14.899 4.094 4.095 14.945 4.095 28c0 13.078 10.828 23.906 23.906 23.906m0-3.984C16.937 47.922 8.1 39.062 8.1 28c0-11.04 8.813-19.922 19.876-19.922c11.039 0 19.921 8.883 19.945 19.922c.023 11.063-8.883 19.922-19.922 19.922m-.211-28.266c1.71 0 3.047-1.36 3.047-3.047c0-1.71-1.336-3.07-3.047-3.07s-3.047 1.36-3.047 3.07a3.026 3.026 0 0 0 3.047 3.047m-3.914 21.235h9.562c.961 0 1.711-.68 1.711-1.641c0-.914-.75-1.64-1.71-1.64H30.53V25.68c0-1.266-.656-2.11-1.828-2.11h-4.43c-.937 0-1.687.727-1.687 1.64c0 .962.75 1.642 1.687 1.642h2.532v10.757h-2.93c-.938 0-1.688.727-1.688 1.641c0 .96.75 1.64 1.688 1.64"/></svg>Tentang kami</a>

                </div>


                <div class="col-lg-8 content card-post col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <input type="text" class="form-control form-control-rounded"
                                        placeholder="Apa yang mau kamu bagikan?" type="button"
                                        data-bs-toggle="modal" data-bs-target="#questionsModal">
                                    <div class="row mt-3" style="justify-content: center">
                                        <div class="col-4">
                                            <button class="btn btn-ghost-secondary w-100 btn-pill" type="button"
                                                data-bs-toggle="modal" data-bs-target="#questionsModal">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-edit" width="24" height="24"
                                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1">
                                                    </path>
                                                    <path
                                                        d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z">
                                                    </path>
                                                    <path d="M16 5l3 3"></path>
                                                </svg>
                                                Post
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="d-lg-none"> <!-- Tampilkan hanya di layar kecil -->
                        <div class="dropdown1">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="sortDropdown"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Urutkan
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="sortDropdown">
                                @foreach ([
                                            'newest' => 'Terbaru',
                                            'upvotes' => 'Like Terbanyak',
                                            'downvotes' => 'Unlike Terbanyak',
                                            'oldest' => 'Terlama',
                                        ] as $sortKey => $sortLabel)
                                    <li>
                                        <a class="dropdown-item {{ request('sort') === $sortKey ? 'active' : '' }}"
                                            href="{{ route(auth()->user()->role . '.homekategori', ['sort' => $sortKey, 'kategori' => $selectedKategori]) }}">
                                            @switch($sortKey)
                                                @case('newest')
                                                    <!-- SVG Icon for Newest -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                        viewBox="0 0 24 24">
                                                        <path fill="currentColor"
                                                            d="M11 14v2q0 .425.288.713T12 17t.713-.288T13 16v-2h2q.425 0 .713-.288T16 13t-.288-.712T15 12h-2v-2q0-.425-.288-.712T12 9t-.712.288T11 10v2H9q-.425 0-.712.288T8 13t.288.713T9 14zm1 8q-1.875 0-3.512-.712t-2.85-1.925t-1.925-2.85T3 13t.713-3.512t1.924-2.85t2.85-1.925T12 4t3.513.713t2.85 1.925t1.925 2.85T21 13t-.712 3.513t-1.925 2.85t-2.85 1.925T12 22M2.05 7.3q-.275-.275-.275-.7t.275-.7L4.9 3.05q.275-.275.7-.275t.7.275t.275.7t-.275.7L3.45 7.3q-.275.275-.7.275t-.7-.275m19.9 0q-.275.275-.7.275t-.7-.275L17.7 4.45q-.275-.275-.275-.7t.275-.7t.7-.275t.7.275l2.85 2.85q.275.275.275.7t-.275.7" />
                                                    </svg>
                                                @break

                                                @case('upvotes')
                                                    <!-- SVG Icon for Upvotes -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                        viewBox="0 0 24 24">
                                                        <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="1.5"
                                                            d="M14.54 10.105h5.533c2.546 0-.764 10.895-2.588 10.895H4.964A.956.956 0 0 1 4 20.053v-9.385c0-.347.193-.666.502-.832C6.564 8.73 8.983 7.824 10.18 5.707l1.28-2.266A.87.87 0 0 1 12.222 3c3.18 0 2.237 4.63 1.805 6.47a.52.52 0 0 0 .513.635" />
                                                    </svg>
                                                @break

                                                @case('downvotes')
                                                    <!-- SVG Icon for Downvotes -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                        viewBox="0 0 24 24">
                                                        <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="1.5"
                                                            d="M10.46 13.895H4.927C2.381 13.895 5.691 3 7.515 3h12.521c.532 0 .964.424.964.947v9.385a.95.95 0 0 1-.502.832c-2.062 1.106-4.481 2.012-5.678 4.129l-1.28 2.266a.87.87 0 0 1-.762.441c-3.18 0-2.237-4.63-1.805-6.47a.52.52 0 0 0-.513-.635" />
                                                    </svg>
                                                @break

                                                @case('oldest')
                                                    <!-- SVG Icon for Oldest -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                        viewBox="0 0 24 24">
                                                        <path fill="currentColor"
                                                            d="M12 22q-1.875 0-3.512-.712t-2.85-1.925t-1.925-2.85T3 13t.713-3.512t1.924-2.85t2.85-1.925T12 4t3.513.713t2.85 1.925t1.925 2.85T21 13t-.712 3.513t-1.925 2.85t-2.85 1.925T12 22m2.8-4.8l1.4-1.4l-3.2-3.2V8h-2v5.4zM5.6 2.35L7 3.75L2.75 8l-1.4-1.4zm12.8 0l4.25 4.25l-1.4 1.4L17 3.75z" />
                                                    </svg>
                                                @break
                                            @endswitch
                                            {{ $sortLabel }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div> --}}
                    <div class="d-lg-none"> <!-- Tampilkan hanya di layar kecil -->
                        <div class="dropdown1">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="filterDropdown"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Filter
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="filterDropdown">
                                <!-- Reset Button -->
                                <li>
                                    <a href="{{ route(auth()->user()->role . '.homekategori') }}" class="dropdown-item text-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                            class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M8 3a5 5 0 1 0 5 5 .5.5 0 0 1 1 0 6 6 0 1 1-6-6V.5a.5.5 0 0 1 1 0V3z" />
                                        </svg>
                                        Reset Filter
                                    </a>
                                </li>

                                <!-- Kategori Section -->
                                <li class="dropdown-header">Pilih Kategori</li>
                                @foreach (['Aqidah', 'Fiqih', 'Sirah', 'Lainnya'] as $kategori)
                                    <li>
                                        <a href="{{ route(auth()->user()->role . '.homekategori', ['kategori' => $kategori, 'sort' => request('sort')]) }}"
                                            class="dropdown-item {{ $selectedKategori === $kategori ? 'active' : '' }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M4 4h6v6H4zm10 0h6v6h-6zM4 14h6v6H4zm13 3m-3 0a3 3 0 1 0 6 0a3 3 0 1 0-6 0" />
                                            </svg>
                                            {{ $kategori }}
                                        </a>
                                    </li>
                                @endforeach


                                <!-- Urutkan Section -->
                                <li class="dropdown-header">Urutkan Berdasarkan</li>
                                @foreach ([
                                            'newest' => 'Terbaru',
                                            'upvotes' => 'Like Terbanyak',
                                            'downvotes' => 'Unlike Terbanyak',
                                            'oldest' => 'Terlama',
                                        ] as $sortKey => $sortLabel)
                                    <li>
                                        <a href="{{ route(auth()->user()->role . '.homekategori', ['sort' => $sortKey, 'kategori' => $selectedKategori]) }}"
                                            class="dropdown-item {{ request('sort') === $sortKey ? 'active' : '' }}">
                                            @switch($sortKey)
                                                @case('newest')
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                                        <path fill="currentColor"
                                                            d="M11 14v2q0 .425.288.713T12 17t.713-.288T13 16v-2h2q.425 0 .713-.288T16 13t-.288-.712T15 12h-2v-2q0-.425-.288-.712T12 9t-.712.288T11 10v2H9q-.425 0-.712.288T8 13t.288.713T9 14zm1 8q-1.875 0-3.512-.712t-2.85-1.925t-1.925-2.85T3 13t.713-3.512t1.924-2.85t2.85-1.925T12 4t3.513.713t2.85 1.925t1.925 2.85T21 13t-.712 3.513t-1.925 2.85t-2.85 1.925T12 22" />
                                                    </svg>
                                                @break

                                                @case('upvotes')
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="1.5"
                                                            d="M14.54 10.105h5.533c2.546 0-.764 10.895-2.588 10.895H4.964A.956.956 0 0 1 4 20.053v-9.385c0-.347.193-.666.502-.832C6.564 8.73 8.983 7.824 10.18 5.707l1.28-2.266A.87.87 0 0 1 12.222 3c3.18 0 2.237 4.63 1.805 6.47a.52.52 0 0 0 .513.635" />
                                                    </svg>
                                                @break

                                                @case('downvotes')
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="1.5"
                                                            d="M10.46 13.895H4.927C2.381 13.895 5.691 3 7.515 3h12.521c.532 0 .964.424.964.947v9.385a.95.95 0 0 1-.502.832c-2.062 1.106-4.481 2.012-5.678 4.129l-1.28 2.266a.87.87 0 0 1-.762.441c-3.18 0-2.237-4.63-1.805-6.47a.52.52 0 0 0-.513-.635" />
                                                    </svg>
                                                @break

                                                @case('oldest')
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                                        <path fill="currentColor"
                                                            d="M12 22q-1.875 0-3.512-.712t-2.85-1.925t-1.925-2.85T3 13t.713-3.512t1.924-2.85t2.85-1.925T12 4t3.513.713t2.85 1.925t1.925 2.85T21 13t-.712 3.513t-1.925 2.85t-2.85 1.925T12 22m2.8-4.8l1.4-1.4l-3.2-3.2V8h-2v5.4zM5.6 2.35L7 3.75L2.75 8l-1.4-1.4zm12.8 0l4.25 4.25l-1.4 1.4L17 3.75z" />
                                                    </svg>
                                                @break
                                            @endswitch
                                            {{ $sortLabel }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>


                    @foreach ($question as $info)
                        <div class="card" style="margin-bottom: 10px!important;"
                            id="question-{{ $info->id_question }}">
                            @include('home.question')
                        </div>
                    @endforeach


                </div>
                <div class="col-lg-1 call-to-action sticky" style="height: min-content;">
                    <div class="form-group">
                        <label for="city-search">Cari Kota:</label>
                        <input type="text" id="city-search" class="form-control" placeholder="Masukkan nama kota...">
                        <ul id="city-list" class="list-group mt-2"></ul>
                    </div>

                    <div id="schedule" class="mt-4" style="display: none;">
                        <h4>Jadwal Sholat untuk <span id="city-name"></span></h4>
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

                    <div class="row mt-4">
                        <div class="col-sm-6">
                            <a href="{{ route('kitab.surah') }}" class="card card-button">
                                <div class="card-body">
                                    <h5 class="card-title">AL-Quran</h5>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-6">
                            <a href="{{ route('hadith') }}" class="card card-button">
                                <div class="card-body">
                                    <h5 class="card-title">Hadits</h5>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-6">
                            <a href="{{ route('kitab.doa') }}" class="card card-button">
                                <div class="card-body">
                                    <h5 class="card-title">Doa Harian</h5>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-6">
                            <a href="{{ route('kitab.kalkulator') }}" class="card card-button">
                                <div class="card-body">
                                    <h5 class="card-title">Kalkulator Zakat</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                    <ul class="list-group" style="margin-bottom: 10px!important;">
                        @foreach ($iklan->shuffle()->take(3) as $item)
                            <li class="list-group-item" data-bs-toggle="modal"
                                data-bs-target="#iklanModal{{ $item->id_iklan }}" style="cursor: pointer;">
                                <img src="data:image/png;base64,{{ $item->gambar }}" class="img-fluid"
                                    style="max-width: 40%; height: auto;">
                                <a style="text-decoration:none;">{{ $item->judul }}
                                </a>
                            </li>

                            <!-- Iklan Modal -->
                            <div class="modal fade" id="iklanModal{{ $item->id_iklan }}" tabindex="-1" role="dialog"
                                aria-labelledby="imageModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <b>{{ $item->judul }}</b>
                                        </div>
                                        <div class="modal-body">
                                            <img src="data:image/png;base64,{{ $item->gambar }}" class="img-fluid"
                                                style="max-width: 40%; height: auto;">
                                            <br></br>
                                            <p>{{ $item->deskripsi }}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="{{ $item->linkIklan }}" class="btn btn-success" target="_blank"
                                                rel="noopener noreferrer">Klik untuk informasi lebih lanjut</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>



        <!-- Question Modal -->
        <div class="modal fade" id="questionsModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form id="questionsForm" action="{{ route(auth()->user()->role . '.createquestion') }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <b>Buat Postingan</b>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3" style="display: flex">
                                <div class="col-4">
                                    <select id="kategori" name="kategori" class="form-control"
                                        style="color: #b2b2b3!important;" required>
                                        <option value="" disabled selected>Pilih Kategori </option>
                                        <option style="color: black!important;" value="Aqidah">Aqidah</option>
                                        <option style="color: black!important;" value="Fiqih">Fiqih</option>
                                        <option style="color: black!important;" value="Sirah">Sirah</option>
                                        <option style="color: black!important;" value="Lainnya">Lainnya</option>
                                    </select>
                                </div>
                                <div class="col-8" style="display:flex; justify-content: flex-end;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                        viewBox="0 0 24 24" onclick="document.getElementById('fileInput').click();">
                                        <g fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2">
                                            <path
                                                d="M15 8h.01M3 6a3 3 0 0 1 3-3h12a3 3 0 0 1 3 3v12a3 3 0 0 1-3 3H6a3 3 0 0 1-3-3z" />
                                            <path d="m3 16l5-5c.928-.893 2.072-.893 3 0l5 5" />
                                            <path d="m14 14l1-1c.928-.893 2.072-.893 3 0l3 3" />
                                        </g>
                                    </svg>
                                    <input type="file" id="fileInput" name="image" style="display: none;"
                                        accept="image/*" onchange="previewImage(event)">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" style="color: #000000;">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" class="border rounded-0 form-control summernote" rows="6"
                                    placeholder="Tuliskan Sesuatu" required></textarea>
                            </div>
                            <div id="preview" style="display: flex; justify-content:center; cursor: pointer;"
                                onclick="document.getElementById('fileInput').click();"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-ghost-secondary btn-pill" data-bs-dismiss="modal"
                                id="cancelButton">Cancel</button>
                            <button type="submit" class="btn btn-primary btn-pill">Post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>



        <script>
            // Fungsi untuk menampilkan pratinjau gambar
            function previewImage(event) {
                const preview = document.getElementById('preview');
                preview.innerHTML = ''; // Kosongkan preview sebelumnya

                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        // img.style.maxWidth = '100%';
                        // img.style.maxHeight = '300px'; // Sesuaikan tinggi maksimum jika perlu
                        preview.appendChild(img);
                    };

                    reader.readAsDataURL(file);
                }
            }

            // Fungsi untuk mereset modal
            function resetModal() {
                const form = document.getElementById('questionsForm');
                form.reset(); // Mereset form

                // Kosongkan pratinjau gambar
                const preview = document.getElementById('preview');
                preview.innerHTML = '';
            }

            // Event listener untuk modal
            document.getElementById('questionsModal').addEventListener('hidden.bs.modal', function(e) {
                resetModal(); // Reset modal ketika modal ditutup
            });
        </script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                // Ambil query parameter dari URL
                const urlParams = new URLSearchParams(window.location.search);
                const focusId = urlParams.get('focus');

                // Cek apakah parameter 'focus' ada
                if (focusId) {
                    // Cari elemen berdasarkan ID
                    const element = document.getElementById(`question-${focusId}`);

                    if (element) {
                        // Scroll ke elemen dengan animasi halus
                        element.scrollIntoView({
                            behavior: 'smooth',
                            block: 'center'
                        });

                        // Berikan efek sorotan untuk menandai elemen dengan box shadow
                        element.style.transition = 'box-shadow 0.5s';
                        element.style.boxShadow = '0 0 10px 5px rgba(66, 153, 225, 0.7)'; // Warna shadow sementara

                        // Kembalikan shadow ke semula setelah 2 detik
                        setTimeout(() => {
                            element.style.boxShadow = '';
                        }, 2000);
                    }
                }
            });
        </script>


        <script src="{{ asset('assets/js/jadwal-sholat.js') }}"></script>


    </body>



    <script>
        // Fungsi untuk menampilkan pratinjau gambar
        function previewImage(event) {
            const preview = document.getElementById('preview');
            preview.innerHTML = ''; // Kosongkan preview sebelumnya

            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    // img.style.maxWidth = '100%';
                    // img.style.maxHeight = '300px'; // Sesuaikan tinggi maksimum jika perlu
                    preview.appendChild(img);
                };

                reader.readAsDataURL(file);
            }
        }

        // Fungsi untuk mereset modal
        function resetModal() {
            const form = document.getElementById('questionsForm');
            form.reset(); // Mereset form

            // Kosongkan pratinjau gambar
            const preview = document.getElementById('preview');
            preview.innerHTML = '';
        }

        // Event listener untuk modal
        document.getElementById('questionsModal').addEventListener('hidden.bs.modal', function(e) {
            resetModal(); // Reset modal ketika modal ditutup
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var successMessage = document.getElementById('success-message');
            var errorMessages = document.getElementById('error-messages');

            if (successMessage) {
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses',
                    text: successMessage.getAttribute('data-message'),
                    confirmButtonText: 'OK'
                });
            }

            if (errorMessages) {
                var errors = JSON.parse(errorMessages.getAttribute('data-errors'));
                errors.forEach(function(error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: error,
                        confirmButtonText: 'OK'
                    });
                });
            }
        });
    </script>
@endsection
