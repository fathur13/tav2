@extends('layouts/app')
@section('link')
    <li class="breadcrumb-item"><a href="#"></i>tes</a></li>
    <li class="breadcrumb-item active" aria-current="page">tes
    </li>
@endsection
@section('header', 'tes')
@section('conten')


    <!-- Button untuk menampilkan pop up -->
    <button id="exportButton">Export Data</button>

    <!-- Pop up (Modal) -->
    <div id="exportModal" style="display: none;">
        <!-- Konten pop up -->
        <form action="{{ route('export.data') }}" method="post">
            @csrf
            <!-- Input field untuk memilih rentang waktu -->
            <label for="fromDate">Dari Tanggal:</label>
            <input type="date" id="fromDate" name="fromDate">
            <label for="toDate">Hingga Tanggal:</label>
            <input type="date" id="toDate" name="toDate">
            <!-- Tombol submit untuk mengirim data -->
            <button type="submit">Export</button>
        </form>
    </div>

    <script>
        // Ambil tombol dan modal menggunakan JavaScript
        const exportButton = document.getElementById('exportButton');
        const exportModal = document.getElementById('exportModal');

        // Ketika tombol di klik, tampilkan modal
        exportButton.addEventListener('click', function() {
            exportModal.style.display = 'block';
        });
    </script>

@endsection
