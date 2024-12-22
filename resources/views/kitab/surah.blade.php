@extends('partials.navbar')
@section('surah')
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>

    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
</head>
<body>
    <section class="container1" id="Pendahuluan">
        <div class="conten">
            <div class="container2 p-4">
                <div class="heading mt-5" id="DaftarSurah">
                    <h1 class="judul-list">Daftar Surah</h1>
                </div>
                <div class="list-surah mt-5">
                    <!-- List Surah akan dimuat di sini oleh JavaScript -->
                </div>
            </div>
        </div>
    </section>

    <!-- Modal Terjemahan -->
    <div class="modal fade" id="terjemahan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="exampleModalLabel"></h1>
                    <button type="button" class="btn-close closed btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="quran"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn button closed p-2" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tanpa Terjemah -->
    <div class="modal fade" id="noterjemahan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title jdl" id="exampleModalLabel"></h1>
                    <button type="button" class="btn-close closed btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body mdlQuran d-flex flex-column align-items-center">
                    <!-- Data surah tanpa terjemah akan dimuat di sini -->
                </div>
                <div class="modal-footer">
                    <button id="closeModalButton" type="button" class="btn button closed p-2" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Opsi -->
    <div class="modal fade opsi" id="opsi" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close btn-close-white closed" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <button type="button" class="btn button p-2 tarjim" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#terjemahan">Terjemah</button>
                    <button type="button" class="btn button p-2 mt-3 notarjim" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#noterjemahan">Tanpa Terjemah</button>
                </div>
            </div>
        </div>
    </div>


    <section class="container2 p-4" id="KirimMasukan">

      <p class="mt-4 mb-5 introduction"> <span class="judul">Quran-ku</span> mengharapkan masukan dan saran dari anda supaya kami bisa tahu keluhan anda saat menggunakan aplikasi <span class="judul">Quran-ku</span>. Beri kami pesan yang sopan dan jelas supaya kami sigap dalam menanggapi keluhan anda.</p>
      <div class="alert d-none alert-success alert-dismissible fade show my-alert" role="alert">
           <strong>Terimakasih !</strong> Pesan anda sudah terkirim
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>

    </section>
    <footer id="foot" class="foot mt-5 d-flex justify-content-center align-items-center">
      <div class="container5 d-flex justify-content-center flex-wrap gap-5 p-4">

        <div class="sosial">
          <p class="tit">Sosial Media</p>
          <a href="https://wa.me/6288216018165" target="_blank">Whatsapp</a>
          <a href="https://instagram.com/23.exs" target="_blank">Instagram</a>
          <a href="https://github.com/abrazax56" target="_blank">Github</a>
        </div>
        <div class="sosial">
          <p class="tit">Privasi</p>
          <a href="https://quran-api.santrikoding.com/api/surah" target="_blank">Ketentuan</a>
          <a href="https://quran-api.santrikoding.com/api/surah" target="_blank">API</a>
          <a href="https://quran-api.santrikoding.com/api/surah" target="_blank">Dokumen</a>
          <a href="https://quran-api.santrikoding.com/api/surah" target="_blank">Permintaan</a>
        </div>
      </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script>
        // Menangani penutupan modal dengan tombol yang memiliki class 'closed'
        document.addEventListener("click", function(e) {
          if(e.target.classList.contains('closed')) {
            const modal = e.target.closest('.modal'); // Menemukan modal terdekat
            if (modal) {
              const modalInstance = bootstrap.Modal.getInstance(modal); // Mendapatkan instance modal
              modalInstance.hide(); // Menutup modal
            }
          }
        });

        // Memuat daftar surah
        const listSurah = document.querySelector('.list-surah');
        const quran = document.querySelector('.quran');
        const quran2 = document.querySelector('.mdlQuran');
        const judulSurah = document.querySelector('.modal-title');
        const judulSurah2 = document.querySelector('.jdl');

        (function getListSurah() {
          return fetch('https://quran-api.santrikoding.com/api/surah')
            .then(response => response.json())
            .then(response => {
              let cards = '';
              response.forEach((e, i) => {
                let no = i + 1;
                cards += uiListSurah(e, no.toLocaleString('ar-EG'));
              });
              listSurah.innerHTML = cards;
            });
        })();

        // Menangani klik pada elemen surah untuk menampilkan detail
        document.addEventListener("click", async function(e) {
          if(e.target.classList.contains('detail')) {
            const nomor = e.target.dataset.nomor;
            await getNamaSurah(nomor - 1);
            await getShowSurah(nomor);
            if(e.target.classList.contains('notarjim')) {
              await getNamaSurah(nomor - 1);
              await getShowSurah(nomor);
            }
          }
        });

        function getNamaSurah(i) {
          fetch('https://quran-api.santrikoding.com/api/surah')
            .then(response => response.json())
            .then(response => {
              const namaSurat = response[i].nama_latin;
              judulSurah.innerHTML = namaSurat;
              judulSurah2.innerHTML = namaSurat;
            });
        }

        function getShowSurah(i) {
          quran.innerHTML = `<h1 class="load">Memuat...</h1>`;
          quran2.innerHTML = `<h1 class="load" align="center">Memuat...</h1>`;
          fetch(`https://quranenc.com/api/v1/translation/sura/indonesian_affairs/${i}`)
            .then(response => response.json())
            .then(response => {
              const result = response.result;
              let cards = '';
              let cards2 = '';
              result.forEach((e, i) => {
                let footnotes = (e.footnotes == "") ? '' : `<div class="footnotes"><div class="catatan">Catatan Kaki :</div>
                <div class="catatanny">${e.footnotes}</div></div>`;
                let ayat = i + 1;
                cards += showSurah(e, ayat, footnotes);
                cards2 += showSurah2(e, ayat);
              });
              quran.innerHTML = cards;
              quran2.innerHTML = `<p class="bismillah" align="center">بِسْمِ اللَّهِ الرحمن الرَّحِيمِ</p>
                                  <p class="quran2" align="right">${cards2}</p>`;
            });
        }

        function uiListSurah(e, i) {
          return `<button type="button" class="grid-items detail" data-bs-toggle="modal" data-bs-target="#opsi" data-nomor="${e.nomor}">
                    <p class="nomor_surah detail" data-bs-toggle="modal" data-bs-target="#opsi" data-nomor="${e.nomor}">${i}</p>
                    <p class="nama_surat detail" data-bs-toggle="modal" data-bs-target="#opsi" data-nomor="${e.nomor}">${e.nama}</p>
                    <p class="nama_latin detail" data-bs-toggle="modal" data-bs-target="#opsi" data-nomor="${e.nomor}">${e.nama_latin}</p>
                    <p class="jumlah_ayat detail" data-bs-toggle="modal" data-bs-target="#opsi" data-nomor="${e.nomor}">Jumlah Ayat : ${e.jumlah_ayat}</p>
                  </button>`;
        }

        function showSurah(e, ayat, footnotes) {
          return `<div class="bungkus">
                   <div class="ayatbungkus d-flex justify-content-between w-100">
                     <div class="ayat ayah d-flex justify-content-center align-items-center"><img src="img/ayat.png" width="80" class="kurung"/><h1 class="ayatny">${ayat.toLocaleString('ar-EG')}</h1></div>
                     <div align="right" class="arabic">${e.arabic_text}</div>
                   </div>
                   <div class="translate">
                     <div class="terjemah">Terjemah :</div>
                     <div class="terjemahan">${e.translation}</div>
                   </div>
                   ${footnotes}
                  </div>`;
        }

        function showSurah2(e, ayat) {
          return `<div class="ayatbungkus d-flex justify-content-between w-100">
                    <div class="ayat ayah d-flex justify-content-center align-items-center"><img src="img/ayat.png" width="80" class="kurung"/><h1 class="ayatny">${ayat.toLocaleString('ar-EG')}</h1></div>
                    <div align="right" class="arabic">${e.arabic_text}</div>
                  </div>`;
        }
      </script>
</body>
@endsection
