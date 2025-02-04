 // Menutup modal ketika tombol dengan class 'closed' diklik
 document.addEventListener("click", function(e) {
    if(e.target.classList.contains('closed')) {
      const modal = e.target.closest('.modal'); // Menemukan modal yang paling dekat dengan tombol
      const modalInstance = bootstrap.Modal.getInstance(modal); // Mendapatkan instance modal
      modalInstance.hide(); // Menutup modal
    }
    const closeModalButton = document.querySelector('#closeModalButton');
closeModalButton.addEventListener('click', function () {
  $('#modalId').modal('hide'); // Jika menggunakan Bootstrap
});

  });

  // Mengambil data surah untuk ditampilkan dalam modal
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
    if (e.target.classList.contains('closed')) {
      quran.innerHTML = '';
      judulSurah.innerHTML = '';
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
               <div class="ayat ayah d-flex justify-content-center align-items-center"><img src="img/ayat.png" width="80" class="kurung responsive-image"/><h1 class="ayatny">${ayat.toLocaleString('ar-EG')}</h1></div>
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
