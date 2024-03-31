@extends('layouts.dashboard.main')

@section('content')
    <div class="pb-3">
        <h2>SPK ini dirancang mengacu pada Framework yang diusulkan Putro (2023). Visualisasi framewrok sebagai berikut:
        </h2>
        <img src="{{ asset('dist/media/img/framework-setelah-validasi.png') }}" alt="">
        <p>Sumber : </p><a
            href="https://www.emerald.com/insight/content/doi/10.1108/ICS-03-2023-0031/full/html">https://www.emerald.com/insight/content/doi/10.1108/ICS-03-2023-0031/full/html</a>
        <h4>Penggunaan SPK</h4>
        <ul>
            <li>Pengguna Memasukkan nama dan deskripsi IIIV</li>
            <li>Pengguna Memilih sistem elektronik apa saja yang terhubung berdasarkan jenis keterhubungannya. Jika sistem
                elektronik terhubung tidak ada pada sistem, pengguna dapat menambahkan</li>
            <li>SPK akan memilih sistem elektronik dengan nilai keterhubungan yang paling tinggi</li>
            <li>Jika SPK tidak bisa menentukan sistem elektronik yang nilai keterhubungannya paling tinggi, maka Pengguna
                akan diminta memberikan profil risiko IIV</li>
            <li>SPK akan memilik sistem elektronik terhubung dengan profil risiko paling mendekati</li>
            <li>Pengguna dapat juga memilih Sistem Ideal atau Sistem ISO. Sistem Ideal merupakan representasi Peraturan BSSN
                tentang Kerangka Kerja Pelindungan Infrastruktur Informasi Vital. Sistem ISO merupakan representasi ISO
                27001:2022</li>
        </ul>
        <p>Jika ada hal yang perlu ditanyakan, dpat menghubungi <strong>prasetyo.adi01@ui.ac.id</strong></p>
    </div>
@endsection
