@extends('layouts/app')
@section('link')
    <li class="breadcrumb-item active" aria-current="page">Report
    </li>
@endsection
@section('header', 'Report')
@section('conten')
    {{-- panggil file jquery untuk proses realtime --}}
    <script type="text/javascript" src="{{ url('public/assets/jquery/jquery.min.js') }}"></script>

    {{-- ajax untuk suhu kelembapan cuaca --}}
    <script type="text/javascript">
        $(document).ready(function() {
            setInterval(function() {
                $("#suhu").load("{{ url('bacasuhu') }}");
                $("#kelembapan").load("{{ url('bacakelembapan') }}");
                // $("#cuaca").load("{{ url('bacacuaca') }}");
                $.get("{{ url('bacacuaca') }}", function(data) {
                    // Memeriksa apakah sedang hujan atau tidak
                    if (data == "1") {
                        // Mengubah teks menjadi "Hujan"
                        $("#cuaca-text").text("Hujan!");
                        // Mengubah latar belakang menjadi gambar hujan
                    } else if (data == "2") {
                        // Mengubah teks menjadi "Tidak hujan"
                        $("#cuaca-text").text("Tidak Hujan!");
                    } else {
                        $("#cuaca-text").text("Invalid data");
                    }
                });
            }, 1000);
        })
    </script>

    <div class="container-fluid">
        <div class="row ">
            <div class="col-xxl-3 col-sm-6 mb-25">
                <div class="ap-po-details ap-po-details--2 p-25 radius-xl d-flex justify-content-between">
                    <div class="overview-content w-100">
                        <div class="ap-po-details-content d-flex flex-wrap justify-content-between">
                            <div class="ap-po-details__titlebar">
                                <h1>Ketinggian Air</h1>
                                {{-- <p>Ketinggian Air</p> --}}<br><br>
                            </div>
                            <div class="ap-po-details__icon-area">
                                <div class="svg-icon order-bg-opacity-primary color-primary">
                                    <i class="uil uil-arrow-growth"></i>
                                </div>
                            </div>
                        </div>
                        <div class="ap-po-details-time">
                            <small id="ketinggian-air"></small> cm,
                            <span id="kid-status"></i>
                                <strong></strong></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-sm-6 mb-25">
                <div class="ap-po-details ap-po-details--2 p-25 radius-xl d-flex justify-content-between">
                    <div class="overview-content w-100">
                        <div class="ap-po-details-content d-flex flex-wrap justify-content-between">
                            <div class="ap-po-details__titlebar">
                                <h1>Suhu</h1>
                            </div>
                            <div class="ap-po-details__icon-area">
                                <div class="svg-icon order-bg-opacity-info color-info">
                                    <i class="uil uil-temperature"></i>
                                </div>
                            </div>
                        </div>
                        <div class="ap-po-details-time mt-25">
                            <small id="suhu"></small>
                            <small>℃</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-sm-6 mb-25">
                <div class="ap-po-details ap-po-details--2 p-25 radius-xl d-flex justify-content-between">
                    <div class="overview-content w-100">
                        <div class="ap-po-details-content d-flex flex-wrap justify-content-between">
                            <div class="ap-po-details__titlebar">
                                <h1>Kelembapan</h1>
                            </div>
                            <div class="ap-po-details__icon-area">
                                <div class="svg-icon order-bg-opacity-secondary color-secondary">
                                    <i class="uil uil-discount-outline">%</i>
                                </div>
                            </div>
                        </div>
                        <div class="ap-po-details-time mt-25">
                            <small id="kelembapan"></small>
                            <small>%</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-sm-6 mb-25">
                <div class="ap-po-details ap-po-details--2 p-25 radius-xl d-flex justify-content-between">
                    <div class="overview-content w-100">
                        <div class="ap-po-details-content d-flex flex-wrap justify-content-between">
                            <div class="ap-po-details__titlebar">
                                <h1>Cuaca</h1>
                            </div>
                            <div class="ap-po-details__icon-area">
                                <div class="svg-icon order-bg-opacity-warning color-warning">
                                    <i class="uil uil-images"></i>
                                </div>
                            </div>
                        </div>
                        <div class="ap-po-details-time mt-25">
                            <small id="cuaca-text"></small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xxl-4 col-lg-4 mb-25">
                <div class="card border-0 chartLine-po-details h-100">
                    <div class="card-header border-0 px-25 pt-25 pb-30">
                        <div class="chartLine-po-details__overview-content w-100">
                            <div class="chartLine-po-details__content d-flex flex-wrap justify-content-between">
                                <div class="chartLine-po-details__titlebar">
                                    <h1>Ketinggian Air</h1>
                                    <p>(satu tahun terakhir)</p>
                                </div>
                            </div>
                            <div class="card-extra">
                                <div class="dropdown dropleft">
                                    <a href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <img src="{{ url('public/assets') }}/img/svg/more-horizontal.svg"
                                            alt="more-horizontal" class="svg">
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#"
                                            onclick="downloadKetinggianAirChart()">Download Chart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="wp-chart">
                            <div class="parentContainer">
                                <div>
                                    <canvas id="realtime-chart"></canvas>
                                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-4 col-lg-4 mb-25">
                <div class="card border-0 chartLine-po-details h-100">
                    <div class="card-header border-bottom-0 px-25 pt-25 pb-30">
                        <div class="chartLine-po-details__overview-content w-100">
                            <div class="chartLine-po-details__content d-flex flex-wrap justify-content-between">
                                <div class="chartLine-po-details__titlebar">
                                    <h1>Suhu</h1>
                                    <p>(Satu tahun terakhir)</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-extra">
                            <div class="dropdown dropleft">
                                <a href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <img src="{{ url('public/assets') }}/img/svg/more-horizontal.svg" alt="more-horizontal"
                                        class="svg">
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#" onclick="downloadSuhuChart()">Download Chart</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="wp-chart">
                            <div class="parentContainer">
                                <div>
                                    <canvas id="realtime-chart-suhu"></canvas>
                                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-4 col-lg-4 mb-25">
                <div class="card border-0 chartLine-po-details h-100">
                    <div class="card-header border-bottom-0 px-25 pt-25 pb-30">
                        <div class="chartLine-po-details__overview-content w-100">
                            <div class="chartLine-po-details__content d-flex flex-wrap justify-content-between">
                                <div class="chartLine-po-details__titlebar">
                                    <h1>Kelembapan</h1>
                                </div>
                            </div>
                        </div>
                        <div class="card-extra">
                            <div class="dropdown dropleft">
                                <a href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <img src="{{ url('public/assets') }}/img/svg/more-horizontal.svg"
                                        alt="more-horizontal" class="svg">
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#" onclick="downloadKelembapanChart()">Download
                                        Chart</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="wp-chart">
                            <div class="parentContainer">
                                <div>
                                    <canvas id="realtime-chart-kelembapan"></canvas>
                                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xxl-12 col-lg-6 mb-25">
                <div class="card border-0 px-25">
                    <div class="card-header px-0 border-0">
                        <h6>Report lasted data</h6>
                    </div>
                    <div class="card-header color-dark fw-500">
                        Data <a href="{{ url('report/export') }}" class="btn btn-sm btn-success float-right">Ekspor
                            Data</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label for="mulai_tanggal">Tanggal Awal:</label>
                                <input type="date" class="form-control" id="mulai_tanggal">
                            </div>
                            <div class="form-group col-lg-5">
                                <label for="selesai_tanggal">Tanggal Akhir:</label>
                                <input type="date" class="form-control" id="selesai_tanggal">
                            </div>
                            <div class="col-lg-1 mt-20">
                                <button class="btn btn-sm btn-primary" onclick="exportDataWaktu()">Export</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="t_selling-today" role="tabpanel"
                                aria-labelledby="t_selling-today-tab">
                                <div class="selling-table-wrap">
                                    <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                                        <table class="table table--default table-borderless">
                                            <thead>
                                                <tr>
                                                    <th style="width: 1px">No</th>
                                                    <th>Lokasi</th>
                                                    <th>Ketinggian Air</th>
                                                    <th>Status</th>
                                                    <th>Suhu</th>
                                                    <th>Kelembapan</th>
                                                    <th>Cuaca</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $no = 1;
                                                @endphp
                                                @foreach ($datas as $data)
                                                    <tr>
                                                        <td style="text-align: center">{{ $no++ }}</td>
                                                        <td>{{ $data->sensor }}</td>
                                                        <td>{{ $data->ketinggian_air }}</td>
                                                        <td>{{ $data->status }}</td>
                                                        <td>{{ $data->suhu }}</td>
                                                        <td>{{ $data->kelembapan }}</td>
                                                        <td>
                                                            @if ($data->status_air == 1)
                                                                Hujan
                                                            @elseif ($data->status_air == 2)
                                                                Tidak Hujan
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--  script ketinggian air --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Membuat permintaan setiap 1 detik untuk mendapatkan status KID terbaru dari server
            setInterval(function() {
                $.ajax({
                    url: "{{ route('get-ka-status') }}",
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        // Menampilkan status KID dan ketinggian air terbaru pada halaman web
                        $('#kid-status').html(data.status);
                        $('#ketinggian-air').html(Math.abs(data.ketinggian_air).toFixed(2));
                    }
                });
            }, 1000);
        });
    </script>

    {{-- secript chart ketinggian air --}}
    <script>
        const ctx = document.getElementById('realtime-chart').getContext('2d');

        const chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [],
                datasets: [{
                    label: 'Ketinggian Air (cm)',
                    data: [],
                    borderWidth: 4,
                    borderColor: 'rgba(153, 0, 153)',
                    tension: 0.4,
                    fill: false
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100,
                        ticks: {
                            stepSize: 25
                        }
                    }
                }
            },
        });

        $(document).ready(function() {
            loadDataMenit();
        });

        setInterval(loadDataMenit, 60000)

        function loadDataMenit() {
            $.ajax({
                url: 'chartMenit',
                type: 'GET',
                success: function(data) {
                    chart.data.labels = [];
                    chart.data.datasets[0].data = [];

                    // Objek untuk menyimpan data bulan
                    const dataBulan = [];

                    const satuTahunTerakhir = new Date();
                    satuTahunTerakhir.setFullYear(satuTahunTerakhir.getFullYear() -
                        1); // Mengurangi satu tahun dari tanggal saat ini

                    data.forEach(function(data) {
                        const bulan = getBulan(data.created_at);
                        const ketinggianAir = parseFloat(data.ketinggian_air);
                        const dataDate = new Date(data.created_at);

                        // Memeriksa apakah data berada dalam satu tahun terakhir
                        if (dataDate >= satuTahunTerakhir) {
                            if (!dataBulan[bulan]) {
                                dataBulan[bulan] = {
                                    total: 0,
                                    count: 0
                                };
                            }

                            dataBulan[bulan].total += ketinggianAir;
                            dataBulan[bulan].count++;
                        }
                    });

                    // Menghitung rata-rata perbulan dan menambahkan data ke grafik
                    for (const bulan in dataBulan) {
                        if (dataBulan[bulan] && dataBulan[bulan].count > 0) {
                            const rataRata = dataBulan[bulan].total / dataBulan[bulan].count;
                            chart.data.labels.push(bulan);
                            chart.data.datasets[0].data.push(rataRata);
                        }

                    }

                    chart.update();
                }
            });

            // Fungsi untuk mendapatkan label bulan dari tanggal
            function getBulan(tanggal) {
                const bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September',
                    'Oktober', 'November', 'Desember'
                ];
                const date = new Date(tanggal);
                return bulan[date.getMonth()];
            }

        }
    </script>

    {{-- secript chart suhu --}}
    <script>
        const ctxSuhu = document.getElementById('realtime-chart-suhu').getContext('2d');

        const chartSuhu = new Chart(ctxSuhu, {
            type: 'line',
            data: {
                labels: [],
                datasets: [{
                    label: 'Suhu (°C)',
                    data: [],
                    borderWidth: 4,
                    borderColor: 'rgba(153, 0, 153)',
                    tension: 0.4,
                    fill: false
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100,
                        ticks: {
                            stepSize: 25
                        }
                    }
                }
            },
        });

        $(document).ready(function() {
            loadDataSuhu();
        });

        setInterval(loadDataSuhu, 60000)

        function loadDataSuhu() {
            $.ajax({
                url: 'chartMenit',
                type: 'GET',
                success: function(data) {
                    chartSuhu.data.labels = [];
                    chartSuhu.data.datasets[0].data = [];

                    // Objek untuk menyimpan data bulan
                    const dataBulan = [];

                    const satuTahunTerakhir = new Date();
                    satuTahunTerakhir.setFullYear(satuTahunTerakhir.getFullYear() -
                        1); // Mengurangi satu tahun dari tanggal saat ini

                    data.forEach(function(data) {
                        const bulan = getBulan(data.created_at);
                        const suhu = parseFloat(data.suhu);
                        const dataDate = new Date(data.created_at);

                        // Memeriksa apakah data berada dalam satu tahun terakhir
                        if (dataDate >= satuTahunTerakhir) {
                            if (!dataBulan[bulan]) {
                                dataBulan[bulan] = {
                                    total: 0,
                                    count: 0
                                };
                            }

                            dataBulan[bulan].total += suhu;
                            dataBulan[bulan].count++;
                        }
                    });

                    // Menghitung rata-rata perbulan dan menambahkan data ke grafik
                    for (const bulan in dataBulan) {
                        if (dataBulan[bulan] && dataBulan[bulan].count > 0) {
                            const rataRata = dataBulan[bulan].total / dataBulan[bulan].count;
                            chartSuhu.data.labels.push(bulan);
                            chartSuhu.data.datasets[0].data.push(rataRata);
                        }
                    }

                    chartSuhu.update();
                }
            });

            // Fungsi untuk mendapatkan label bulan dari tanggal
            function getBulan(tanggal) {
                const bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September',
                    'Oktober', 'November', 'Desember'
                ];
                const date = new Date(tanggal);
                return bulan[date.getMonth()];
            }
        }
    </script>

    {{-- secript chart kelembapan --}}
    <script>
        const ctxKelembapan = document.getElementById('realtime-chart-kelembapan').getContext('2d');

        const chartKelembapan = new Chart(ctxKelembapan, {
            type: 'line',
            data: {
                labels: [],
                datasets: [{
                    label: 'Kelembapan (%)',
                    data: [],
                    borderWidth: 4,
                    borderColor: 'rgba(153, 0, 153)',
                    tension: 0.4,
                    fill: false
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100,
                        ticks: {
                            stepSize: 25
                        }
                    }
                }
            },
        });

        $(document).ready(function() {
            loadDataKelembapan();
        });

        setInterval(loadDataKelembapan, 60000)

        function loadDataKelembapan() {
            $.ajax({
                url: 'chartMenit',
                type: 'GET',
                success: function(data) {
                    chartKelembapan.data.labels = [];
                    chartKelembapan.data.datasets[0].data = [];

                    // Objek untuk menyimpan data bulan
                    const dataBulan = [];

                    const satuTahunTerakhir = new Date();
                    satuTahunTerakhir.setFullYear(satuTahunTerakhir.getFullYear() -
                        1); // Mengurangi satu tahun dari tanggal saat ini

                    data.forEach(function(data) {
                        const bulan = getBulan(data.created_at);
                        const kelembapan = parseFloat(data.kelembapan);
                        const dataDate = new Date(data.created_at);

                        // Memeriksa apakah data berada dalam satu tahun terakhir
                        if (dataDate >= satuTahunTerakhir) {
                            if (!dataBulan[bulan]) {
                                dataBulan[bulan] = {
                                    total: 0,
                                    count: 0
                                };
                            }

                            dataBulan[bulan].total += kelembapan;
                            dataBulan[bulan].count++;
                        }
                    });

                    // Menghitung rata-rata perbulan dan menambahkan data ke grafik
                    for (const bulan in dataBulan) {
                        if (dataBulan[bulan] && dataBulan[bulan].count > 0) {
                            const rataRata = dataBulan[bulan].total / dataBulan[bulan].count;
                            chartKelembapan.data.labels.push(bulan);
                            chartKelembapan.data.datasets[0].data.push(rataRata);
                        }
                    }

                    chartKelembapan.update();
                }
            });

            // Fungsi untuk mendapatkan label bulan dari tanggal
            function getBulan(tanggal) {
                const bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September',
                    'Oktober', 'November', 'Desember'
                ];
                const date = new Date(tanggal);
                return bulan[date.getMonth()];
            }

        }
    </script>

    {{-- function --}}
    <script>
        function downloadKetinggianAirChart() {
            const base64Image = chart.canvas.toDataURL("image/png");

            const downloadLink = document.createElement('a');
            downloadLink.href = base64Image;
            downloadLink.download = 'chart_Suhu.png';
            downloadLink.click();
        }

        function downloadSuhuChart() {
            const base64Image = chartSuhu.canvas.toDataURL("image/png");

            const downloadLink = document.createElement('a');
            downloadLink.href = base64Image;
            downloadLink.download = 'chart_Suhu.png';
            downloadLink.click();
        }

        function downloadKelembapanChart() {
            const base64Image = chartKelembapan.canvas.toDataURL("image/png");

            const downloadLink = document.createElement('a');
            downloadLink.href = base64Image;
            downloadLink.download = 'chart_kelembapan.png';
            downloadLink.click();
        }

        function exportDataWaktu() {
            const mulaiTanggal = document.getElementById('mulai_tanggal').value;
            const selesaiTanggal = document.getElementById('selesai_tanggal').value;

            // Redirect ke URL dengan query string berisi range tanggal yang dipilih
            window.location.href = "{{ url('report/exportbyrange') }}" + "?mulai_tanggal=" + mulaiTanggal +
                "&selesai_tanggal=" + selesaiTanggal;
        }
    </script>

    <style>
        .dynamic-table {
            max-height: 400px;
            /* Tentukan tinggi maksimal tabel */
            overflow-y: auto;
            /* Tambahkan scroll vertikal jika diperlukan */
        }
    </style>
@endsection
