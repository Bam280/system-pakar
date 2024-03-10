document.addEventListener('DOMContentLoaded', function () {
    var modalContent = document.getElementById('modalContent');
    
    document.querySelectorAll('[data-target-content]').forEach(function (button) {
        button.addEventListener('click', function () {
            var targetContent = this.getAttribute('data-target-content');
            // Ganti konten modal sesuai dengan tombol yang ditekan
            if (targetContent === 'tataKelola') {
                staticBackdropLabel.innerHTML = 'Rekomendasi Tata Kelola';
                p1.innerHTML = '<p>1. Regulasai Tujuan Pengamanan</p>';
                p2.innerHTML = '<p>2. Regulasi  Fungsi Pengamanan</p>';
                p3.innerHTML = '<p>3. Regulasi  Manajemen Risiko</p>';
                p4.innerHTML = '<p>4. Standar Fungsi Pengamanan</p>';
                p5.innerHTML = '<p>5. Standar Pengembangan dan Operasional Aplikasi</p>';
                p6.innerHTML = '<p>6. Alur kerja untuk penetapan Tujuan Pengamanan</p>';
                p7.innerHTML = '<p>7. Alur kerja untuk pemilihan Fungsi Pengamanan</p>';
                p8.innerHTML = '<p>8. Alur kerja dalam penetapan konteks manajemen risiko</p>';
                p9.innerHTML = '<p>9. Alur kerja untuk penentuan interdependensi</p>';
            } else if (targetContent === 'sumberDaya') {
                staticBackdropLabel.innerHTML = 'Rekomendasi Sumber Daya';
                p1.innerHTML = '<p>1. Pendanaan untuk fungsi pengamanan</p>';
                p2.innerHTML = '<p>2. Pendanaan untuk pendukung fungsi pengamanan</p>';
                p3.innerHTML = '<p>3. Pendanaan dipertimbangkan dalam proses manajemen risiko</p>';
                p4.innerHTML = '<p>4. Keterampilan untuk menggunakan fungsi pengamanan</p>';
                p5.innerHTML = '<p>5. Pengetahuan untuk penentuan interdependensi</p>';
                p6.innerHTML = '<p>6. Kesadaran tentang interdependensi</p>';
                p7.innerHTML = '<p>7. Kesadaran tentang proses manajemen risiko</p>';
            }
        });
    });
});
