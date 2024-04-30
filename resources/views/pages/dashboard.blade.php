@extends('layouts.dashboard.main')

@section('content')
    <div class="pb-3">
        <h2>Sistem pendukung keputusan (SPK) ini dirancang mengacu pada framework yang
            diusulkan untuk pengamanan infrastruktur informasi vital sektor administrasi
            pemerintahan
        </h2>
        <img src="{{ asset('dist/media/img/framework-setelah-validasi.png') }}" alt="">
        <p>Sumber : <a
                href="https://www.emerald.com/insight/content/doi/10.1108/ICS-03-2023-0031/full/html">https://www.emerald.com/insight/content/doi/10.1108/ICS-03-2023-0031/full/html</a>
        </p>
        <h4>Penggunaan SPK</h4>
        <ol>
            <li>
                <h5>Pengguna Memasukkan nama dan deskripsi IIIV</h5>
            </li>
            <li>
                <h5>Pengguna Memilih sistem elektronik apa saja yang terhubung berdasarkan jenis keterhubungannya. Jika
                    sistem
                    elektronik terhubung tidak ada pada sistem, pengguna dapat menambahkan</h5>
            </li>
            <li>
                <h5>SPK akan memilih sistem elektronik dengan nilai keterhubungan yang paling tinggi</h5>
            </li>
            <li>
                <h5>Jika SPK tidak bisa menentukan sistem elektronik yang nilai keterhubungannya paling tinggi, maka
                    Pengguna
                    akan diminta memberikan profil risiko IIV</h5>
            </li>
            <li>
                <h5>SPK akan memilik sistem elektronik terhubung dengan profil risiko paling mendekati</h5>
            </li>
            <li>
                <h5>Pengguna dapat juga memilih Sistem Ideal atau Sistem ISO. Sistem Ideal merupakan representasi Peraturan
                    BSSN
                    tentang Kerangka Kerja Pelindungan Infrastruktur Informasi Vital. Sistem ISO merupakan representasi ISO
                    27001:2022</h5>
            </li>
        </ol>
        <h6>Jika ada hal yang perlu ditanyakan, dpat menghubungi <strong>prasetyo.adi01@ui.ac.id</strong></h6>
    </div>
@endsection
