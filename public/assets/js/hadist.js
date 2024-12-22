const endpoint = "https://api.hadith.gading.dev/books";
const modal = document.getElementById("hadithModal");
const closeModal = document.getElementsByClassName("close")[0];
const hadithTitle = document.getElementById("hadith-title");
const hadithBody = document.getElementById("hadith-body");
const searchInput = document.getElementById("search-hadith");
const pagination = document.getElementById("pagination");

let currentHadiths = [];
let currentPage = 1;
const hadithPerPage = 50;
let totalHadith = 0; // Menyimpan total hadith yang akan ditampilkan

// Fungsi untuk menampilkan hadith ke tabel
function displayHadiths(hadiths) {
    hadithBody.innerHTML = "";

    hadiths.forEach((hadith, i) => {
        const row = document.createElement('tr');
        const contentCell = document.createElement('td');

        // Membuat elemen untuk nomor hadith
        const numberCell = document.createElement('div');
        numberCell.classList.add('hadith-number');
        numberCell.textContent = `Hadith No: ${hadith.number || "N/A"}`; // Tampilkan nomor hadith

        // Membuat container untuk menampung arab dan terjemahan
        const arabText = document.createElement('div');
        arabText.classList.add('arabic-text');
        arabText.innerHTML = hadith.arab || "N/A";  // Teks Arab di atas

        const translationText = document.createElement('div');
        translationText.classList.add('translation-text');
        translationText.innerHTML = hadith.id || "No translation available";  // Terjemahan di bawah

        // Menambahkan elemen-elemen ke dalam satu sel
        contentCell.appendChild(numberCell);
        contentCell.appendChild(arabText);
        contentCell.appendChild(translationText);

        // Tambahkan ke dalam row
        row.appendChild(contentCell);
        hadithBody.appendChild(row);

        // Menambahkan pembatas antar hadith
        const separator = document.createElement('hr');
        separator.classList.add('hadith-separator');
        hadithBody.appendChild(separator);
    });
}


// Fungsi untuk mengupdate pagination dengan format titik-titik
function updatePagination(totalHadiths) {
    pagination.innerHTML = "";
    const totalPages = Math.ceil(totalHadiths / 10); // Menggunakan 10 sebagai jumlah data per halaman
    const pageGroup = 5; // Menampilkan 5 halaman dalam satu grup
    let startPage = Math.max(1, currentPage - Math.floor(pageGroup / 2));
    let endPage = Math.min(totalPages, currentPage + Math.floor(pageGroup / 2));

    // Jika grup terakhir lebih kecil dari total halaman, geser grup ke kanan
    if (endPage - startPage < pageGroup - 1) {
        startPage = Math.max(1, endPage - (pageGroup - 1));
    }

    // Menampilkan halaman sebelumnya
    if (startPage > 1) {
        const prevButton = document.createElement('button');
        prevButton.textContent = '<';
        prevButton.addEventListener('click', () => loadPage(currentPage - 1));
        pagination.appendChild(prevButton);
    }

    // Menampilkan halaman dengan titik-titik
    for (let i = startPage; i <= endPage; i++) {
        const pageButton = document.createElement('button');
        pageButton.textContent = i;

        if (i === currentPage) {
            pageButton.classList.add('active');
        }

        pageButton.addEventListener('click', () => loadPage(i));
        pagination.appendChild(pageButton);
    }

    // Menampilkan halaman berikutnya
    if (endPage < totalPages) {
        const nextButton = document.createElement('button');
        nextButton.textContent = '>';
        nextButton.addEventListener('click', () => loadPage(currentPage + 1));
        pagination.appendChild(nextButton);
    }
}

// Fungsi untuk memuat halaman hadith berdasarkan nomor halaman
function loadPage(page) {
    currentPage = page;
    const start = (page - 1) * 10; // Ambil data dimulai dari index yang sesuai
    const end = page * 10; // Sampai 10 data per halaman

    // Tampilkan 10 data untuk setiap halaman
    displayHadiths(currentHadiths.slice(start, end));
    updatePagination(currentHadiths.length);
}

// Fungsi untuk memuat halaman hadith berdasarkan nomor halaman
function loadPage(page) {
    currentPage = page;
    const start = (page - 1) * hadithPerPage;
    const end = page * hadithPerPage;
    displayHadiths(currentHadiths.slice(start, end));
    updatePagination(currentHadiths.length);
}

// Fungsi untuk menyoroti teks yang dicari
function highlightText(text, searchValue) {
    const regex = new RegExp(`(${searchValue})`, 'gi');
    return text.replace(regex, `<span class="highlight">$1</span>`);
}

// Fungsi untuk filter berdasarkan pencarian
function searchHadith() {
    const searchValue = searchInput.value.toLowerCase();
    const filteredHadiths = currentHadiths.filter(hadith =>
        hadith.arab.toLowerCase().includes(searchValue) ||
        hadith.id.toLowerCase().includes(searchValue)
    );

    const highlightedHadiths = filteredHadiths.map(hadith => {
        return {
            ...hadith,
            arab: highlightText(hadith.arab, searchValue),
            id: highlightText(hadith.id, searchValue)
        };
    });

    displayHadiths(highlightedHadiths.slice(0, hadithPerPage));
    updatePagination(filteredHadiths.length);
}

// Fungsi untuk fetch data hadith dengan pagination dari API
function fetchHadiths(bookId, startRange, endRange) {
    return fetch(`https://api.hadith.gading.dev/books/${bookId}?range=${startRange}-${endRange}`)
        .then(response => response.json())
        .then(hadithData => hadithData.data.hadiths || []);
}

// Fungsi untuk fetch semua hadith dengan range bertahap
// Fungsi untuk fetch semua hadith dengan range bertahap
async function fetchAllHadiths(bookId, totalHadiths) {
    currentHadiths = [];
    totalHadith = totalHadiths;

    let startRange = 1;
    let endRange = 150;

    while (startRange <= totalHadiths) {
        // Pastikan endRange tidak melebihi totalHadith
        if (endRange > totalHadiths) {
            endRange = totalHadiths;
        }

        const hadiths = await fetchHadiths(bookId, startRange, endRange);
        currentHadiths = [...currentHadiths, ...hadiths];
        startRange = endRange + 1;
        endRange = startRange + 149; // Maju 150 hadith untuk batch berikutnya

        // Tampilkan hasil sementara saat range baru di-fetch
        loadPage(1);
    }

    // Update pagination setelah semua data di-fetch
    updatePagination(currentHadiths.length);
}


// Fetch data buku hadith
fetch(endpoint)
    .then((data) => data.json())
    .then((result) => {
        const books = result.data;

        books.forEach((book, index) => {
            const button = document.getElementById(`book-${index + 1}`);
            if (button) {
                button.textContent = `${book.name} (${book.available})`;

                button.addEventListener('click', () => {
                    console.log(`Fetching hadith for ${book.name}`);

                    fetchAllHadiths(book.id, book.available).then(() => {
                        modal.style.display = "block";
                    });
                });
            }
        });
    })
    .catch((error) => console.error(error));

// Close modal
closeModal.onclick = function () {
    modal.style.display = "none";
};

// Search functionality
searchInput.addEventListener('input', searchHadith);
