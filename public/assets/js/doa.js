document.addEventListener('DOMContentLoaded', function () {
    let allDoas = []; // Tempat menyimpan semua doa
    const searchInput = document.getElementById('search-bar');

    // Fungsi untuk mengambil data dari API
    fetch('https://islamic-api-zhirrr.vercel.app/api/doaharian')
        .then(response => response.json()) // Mengonversi response ke JSON
        .then(data => {
            console.log(data); // Log data untuk memastikan format
            allDoas = data.data || []; // Menyimpan data doa yang diterima
            renderDoas(allDoas); // Menampilkan doa tanpa filter pada awalnya
        })
        .catch(error => {
            console.error('Error fetching data:', error);
            document.getElementById('doa-container').innerHTML = '<p>Gagal memuat data doa.</p>';
        });

    // Menambahkan event listener untuk mencari doa
    searchInput.addEventListener('input', function() {
        const searchTerm = searchInput.value.toLowerCase(); // Ambil kata kunci pencarian
        const filteredDoas = allDoas.filter(doa => {
            return doa.title.toLowerCase().includes(searchTerm) || doa.latin.toLowerCase().includes(searchTerm);
        });
        renderDoas(filteredDoas); // Tampilkan doa yang difilter
    });
});

// Fungsi untuk menampilkan data
function renderDoas(doas) {
    const doaContainer = document.getElementById('doa-container');
    doaContainer.innerHTML = ''; // Kosongkan konten sebelumnya

    // Periksa apakah ada data yang diterima
    if (doas && doas.length > 0) {
        doas.forEach(doa => {
            const doaItem = `
                <div style="border: 1px solid #ddd; padding: 20px; border-radius: 10px; background-color: #fff; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                    <h3 style="color: #333;">${doa.title || 'Doa tidak tersedia'}</h3>
                    <p style="font-size: 1.2em; font-family: 'Arial', sans-serif; direction: rtl; color: #444;">${doa.arabic || 'Teks Arab tidak tersedia'}</p>
                    <p><strong>Latin:</strong> ${doa.latin || 'Latin tidak tersedia'}</p>
                    <p><strong>Artinya:</strong> ${doa.translation || 'Arti tidak tersedia'}</p>
                </div>
            `;
            doaContainer.innerHTML += doaItem; // Tambahkan data ke dalam container
        });
    } else {
        doaContainer.innerHTML = '<p>Tidak ada data doa yang tersedia.</p>';
    }
}
