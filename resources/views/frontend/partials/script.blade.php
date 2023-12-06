<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
<script>
    function saveAndNext(step) {
        // Simpan jawaban ke penyimpanan lokal
        if (step === 2) {
            const options = document.querySelectorAll('input[name="options[]"]:checked');
            const selectedOptions = Array.from(options).map(option => option.value);
            localStorage.setItem('options', JSON.stringify(selectedOptions));
        } else if (step === 3) {
            const longText = document.getElementById('longText').value;
            localStorage.setItem('longText', longText);

            // Jika Form 1 sudah diisi, simpan ke database
            const options = JSON.parse(localStorage.getItem('options')) || [];
            if (options.length > 0) {
                // Kirim data ke Laravel untuk disimpan ke database
                saveToDatabase(options, longText);
            }
        }

        // Sembunyikan langkah sebelumnya
        document.getElementById('step' + (step - 1)).style.display = 'none';

        // Tampilkan langkah berikutnya
        document.getElementById('step' + step).style.display = 'block';

        // Jika Form 2 sudah diisi, tampilkan tombol "Simpan ke Database"
        if (step === 3) {
            document.getElementById('saveToDbButton').style.display = 'block';
        }
    }

    function saveToDatabase(options, longText) {
        // Kirim data ke Laravel dengan menggunakan AJAX atau fetch API
        fetch('/diagnose', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    options: options,
                    longText: longText
                })
            })
            .then(response => response.json())
            .then(data => {
                // Data berhasil dikirim ke Laravel
                console.log('Data berhasil disimpan di database:', data);

                // Hapus data dari penyimpanan lokal setelah disimpan ke database
                localStorage.removeItem('options');
                localStorage.removeItem('longText');
            })
            .catch(error => {
                console.error('Terjadi kesalahan:', error);
            });
    }
</script>
