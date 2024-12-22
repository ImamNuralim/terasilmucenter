// Referensi elemen HTML
const citySearch = document.getElementById('city-search');
const cityList = document.getElementById('city-list');
const schedule = document.getElementById('schedule');

// Event listener untuk input pencarian kota
citySearch.addEventListener('input', async function () {
    const keyword = this.value.trim();
    if (keyword.length === 0) {
        cityList.innerHTML = ''; // Kosongkan daftar jika input kosong
        return;
    }

    try {
        const response = await fetch(`https://api.myquran.com/v2/sholat/kota/cari/${keyword}`);
        const data = await response.json();

        cityList.innerHTML = ''; // Reset daftar kota sebelumnya

        // Periksa apakah data ditemukan
        if (data.status && Array.isArray(data.data)) {
            data.data.forEach(city => {
                const li = document.createElement('li');
                li.classList.add('list-group-item');
                li.textContent = city.lokasi;
                li.dataset.id = city.id; // Simpan ID kota di atribut data

                // Klik untuk memilih kota
                li.addEventListener('click', () => {
                    showPrayerSchedule(city.id, city.lokasi);
                });

                cityList.appendChild(li);
            });
        } else {
            cityList.innerHTML = '<li class="list-group-item">Kota tidak ditemukan</li>';
        }
    } catch (error) {
        console.error('Error fetching city data:', error);
        cityList.innerHTML = '<li class="list-group-item">Terjadi kesalahan, coba lagi nanti</li>';
    }
});

// Fungsi untuk menampilkan jadwal sholat
async function showPrayerSchedule(cityId, cityName) {
    const today = new Date().toISOString().split('T')[0]; // Format: yyyy-mm-dd

    try {
        const response = await fetch(`https://api.myquran.com/v2/sholat/jadwal/${cityId}/${today}`);
        const data = await response.json();

        if (data.status && data.data && data.data.jadwal) {
            document.getElementById('city-name').textContent = cityName;
            document.getElementById('imsak').textContent = data.data.jadwal.imsak || 'N/A';
            document.getElementById('subuh').textContent = data.data.jadwal.subuh || 'N/A';
            document.getElementById('dzuhur').textContent = data.data.jadwal.dzuhur || 'N/A';
            document.getElementById('ashar').textContent = data.data.jadwal.ashar || 'N/A';
            document.getElementById('maghrib').textContent = data.data.jadwal.maghrib || 'N/A';
            document.getElementById('isya').textContent = data.data.jadwal.isya || 'N/A';

            schedule.style.display = 'block'; // Tampilkan bagian jadwal sholat
        } else {
            alert('Jadwal sholat untuk kota ini tidak ditemukan.');
        }
    } catch (error) {
        console.error('Error fetching prayer schedule:', error);
        alert('Terjadi kesalahan saat mengambil jadwal sholat.');
    }
}
