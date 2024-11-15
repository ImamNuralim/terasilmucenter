@extends('partials.navbar')
@section('hadith')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Hadith</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sedan:ital@0;1&display=swap" rel="stylesheet">
</head>

<style>
    body {

    background-image: url('{{ asset('assets/img/background.jpg') }}'); /* Pastikan path benar */
    background-size: cover; /* Menyesuaikan gambar agar memenuhi seluruh area */
    background-repeat: no-repeat; /* Mencegah gambar diulang */
    background-position: center; /* Menempatkan gambar di tengah */
    min-height: 100vh; /* Pastikan body memiliki tinggi minimal agar background terlihat */
}

    .table {
        background-color: rgb(255, 255, 255);
        border-collapse: collapse;
        margin: 25px auto;
        padding: 0 20px;
        font-size: 0.9em;
        font-family: sans-serif;
        min-width: 400px;
        max-width: 80%;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.43);
        width: 100%;
        border-radius: 15px;
    }

    .table th, .table td {
        padding: 12px 15px;
        text-align: left;
    }

    .modal-content {
        position: relative;
        padding: 20px;
        border-radius: 15px;
    }

    .close {
        position: absolute;
        top: 10px;
        right: 20px;
        font-size: 1.5em;
        cursor: pointer;
    }

    .hadith-title {
        text-align: center;
        margin: 20px 0;
    }

    .search-container {
        text-align: center;
        margin-bottom: 20px;
    }

    .search-input {
        padding: 10px;
        width: 80%;
        font-size: 1em;
        border-radius: 5px;
        border: 1px solid #ccc;
    }

    .pagination {
        text-align: center;
        margin: 20px 0;
    }

    .pagination button {
        margin: 0 5px;
        padding: 10px;
        font-size: 1em;
        cursor: pointer;
        border: none;
        border-radius: 5px;
        background-color: #ddd;
    }

    .hadith-number {
    font-size: 1.2em;
    font-weight: bold;
    margin-bottom: 5px;
    color: #555;
}

.arabic-text {
    font-size: 1.5em;
    text-align: right;
    font-family: 'Amiri', serif;
    margin-bottom: 10px; /* Spasi antara teks Arab dan terjemahan */
}

.translation-text {
    font-size: 1.2em;
    text-align: justify;
    color: #333; /* Warna teks terjemahan */
}

.hadith-separator {
    border: 0;
    height: 1px;
    background-color: #ddd; /* Warna pembatas */
    margin: 20px 0; /* Jarak antar hadith */
}


    /* Highlight teks yang ditemukan */
    .highlight {
        background-color: lightblue;
        font-weight: bold;
        color: black;
    }

    /* Highlight halaman pagination yang aktif */
    .active {
        background-color: blue;
        color: white;
        font-weight: bold;
    }
    #books-container {
  display: grid;
  grid-template-columns: repeat(3, 1fr); /* Membuat 3 kolom yang rata */
  gap: 10px; /* Memberikan jarak antar button */
  justify-items: center; /* Meng-center setiap button */
}

#books-container button {
  width: 80%;
  height: 80px;
}

  button {
    padding: 15px;
    font-size: 16px;
    background-color: #287bd3; /* Warna biru */
    color: white;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.3s ease; /* Animasi */
  }

  button:hover {
    background-color: #0056b3; /* Warna biru yang lebih gelap saat dihover */
    transform: scale(1.05); /* Perbesar sedikit tombol saat dihover */
  }

  button:active {
    background-color: #004085; /* Warna saat tombol ditekan */
    transform: scale(0.98); /* Efek saat tombol ditekan */
  }

  .mt-2{
    justify-content: center;
  }
  @media (max-width: 600px) {
    .table{
        padding-right: 2px;
    }#books-container {
  display: grid;
  grid-template-columns: repeat(3, 1fr); /* Membuat 3 kolom yang rata */
  gap: 10px; /* Memberikan jarak antar button */
  justify-items: center; /* Meng-center setiap button */
}

#books-container button {
  width: 80%;
  height: 80px;
}

    button {
      font-size: 14px;
      padding: 12px;
    }
  }

  @media (max-width: 400px) {
    button {
      font-size: 12px;
      padding: 10px;
    }
  }
</style>

<body>
    <h2 class="mt-4" style="text-align: center;">Hadith Books</h2>

    <div id="books-container">
        <button id="book-1"></button>
        <button id="book-2"></button>
        <button id="book-3"></button>
        <button id="book-4"></button>
        <button id="book-5"></button>
        <button id="book-6"></button>
        <button id="book-7"></button>
        <button id="book-8"></button>
        <button id="book-9"></button>
    </div>

    <div id="hadithModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2 id="hadith-title" class="hadith-title"></h2>

            <div class="search-container">
                <input type="text" id="search-hadith" class="search-input" placeholder="Cari hadith...">
            </div>

            <table class="table" id="hadith-table">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Hadith</td>
                    </tr>
                </thead>
                <tbody id="hadith-body"></tbody>
            </table>


            <div class="pagination" id="pagination"></div>
        </div>
    </div>
    <script src="{{ asset('assets/js/hadist.js') }}"></script>
</body>

</html>
@stop
