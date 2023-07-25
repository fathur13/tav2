@extends('layouts/app')
@section('link')
    <li class="breadcrumb-item"><a href="#"></i>Data</a></li>
    <li class="breadcrumb-item active" aria-current="page">suhu
    </li>
@endsection
@section('header', 'Suhu')
@section('conten')
    {{-- panggil file jquery untuk proses realtime --}}
    <script type="text/javascript" src="{{ url('public/assets/jquery/jquery.min.js') }}"></script>
    {{-- ajax untuk realtime --}}
    <script type="text/javascript">
        $(document).ready(function() {
            setInterval(function() {
                $("#suhu").load("{{ url('bacasuhu') }}");
            }, 1000);

        })
    </script>
    <div class="container-fluid">
        <div class="row ">
            {{-- chart --}}
            <div class="col-xxl-8 col-lg-8 mb-25">
                <div class="card revenueChartTwo border-0">
                    <div class="card-header">
                        <h6>Suhu (℃)</h6>
                        <div class="card-extra">
                            <div class="dropdown dropleft">
                                <a href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <img src="{{ url('public/assets') }}/img/svg/more-horizontal.svg" alt="more-horizontal"
                                        class="svg">
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">View</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-12 col-lg-6 mb-25">
                        <div class="card border-0 chartLine-po-details h-100">
                            <div class="card-body">
                                <div class="wp-chart">
                                    <div class="parentContainer">
                                        <div>
                                            <div class="col-xl-12" style="margin-bottom: 10px; height:20rem">
                                                <canvas id="realtime-chart"></canvas>
                                                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            {{-- data cuaca dan data suhu dan kelembapan --}}
            <div class="col-xxl-4 col-lg-4 mb-25">
                <div class="card revenueChartTwo border-0">
                    <div class="card-header">
                        <h6>Data Suhu</h6>
                        <div class="card-extra">
                            <div class="dropdown dropleft">
                                <a href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <img src="{{ url('public/assets') }}/img/svg/more-horizontal.svg" alt="more-horizontal"
                                        class="svg">
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">View</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-sm-50 pb-sm-30 pt-sm-50 px-30 pb-30 pt-25" style="height: 23rem">
                        <div class="row" style="max-width: 100%; margin: 0 auto;">
                            <div class="col-md-12">
                                <div
                                    style="border-radius: 50%; margin: 0 auto; width: 273px; height: 273px; border: 6px solid #734ed0; color: #000000; text-align: center; font: 32px Arial, sans-serif; display: flex; flex-direction: column; justify-content: center;">
                                    <img src="{{ url('public/assets') }}/img/sensor/termometer.png" alt="Thermometer Icon"
                                        style="width: 80px; height: 80px; margin: 20px auto 0; display: block; width:30px;height:30px;">
                                    <h4 style="margin: 0; font-size: 24px; font-weight: bold; color: #734ed0;">Suhu
                                    </h4>
                                    <div
                                        style="display: flex; justify-content: center; align-items: center; flex-direction: column; height: 100%;">
                                        <span id="suhu" style="font-size: 64px; font-weight: bold;"></span>
                                        <span style="font-size: 24px; font-weight: bold;">℃</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- chart jam dan hari --}}
            <div class="col-xxl-6 col-lg-6 mb-25">
                <div class="card revenueChartTwo border-0">
                    <div class="card-header">
                        <h6>Suhu (Jam)</h6>
                        <div class="card-extra">
                            <div class="dropdown dropleft">
                                <a href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <img src="{{ url('public/assets') }}/img/svg/more-horizontal.svg" alt="more-horizontal"
                                        class="svg">
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">View</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-12 col-lg-6 mb-25">
                        <div class="card border-0 chartLine-po-details h-100">
                            <div class="card-body">
                                <div class="wp-chart">
                                    <div class="parentContainer">
                                        <div>
                                            <div class="col-xl-12" style="margin-bottom: 10px">
                                                <canvas id="realtime-chart-2"></canvas>
                                                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-6 col-lg-6 mb-25">
                <div class="card revenueChartTwo border-0">
                    <div class="card-header">
                        <h6>Suhu (hari)</h6>
                        <div class="card-extra">
                            <div class="dropdown dropleft">
                                <a href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <img src="{{ url('public/assets') }}/img/svg/more-horizontal.svg" alt="more-horizontal"
                                        class="svg">
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">View</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-12 col-lg-6 mb-25">
                        <div class="card border-0 chartLine-po-details h-100">
                            <div class="card-body">
                                <div class="wp-chart">
                                    <div class="parentContainer">
                                        <div>
                                            <div class="col-xl-12" style="margin-bottom: 10px">
                                                <canvas id="realtime-chart-3"></canvas>
                                                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            {{-- table  --}}
            <div class="col-xxl-7 col-lg-6 mb-25">
                <div class="card p-0">
                    <div class="card-header color-dark fw-500">
                        Data <a href="{{ url('suhu/export') }}" class="btn btn-sm btn-success float-right">Ekspor
                            Data</a>
                    </div>
                    <div class="card-body p-0" style="height: : 10 rem">
                        <div class="table4 p-25 mb-30">
                            <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                                <table class="table mb-0">
                                    <thead>
                                        <tr class="userDatatable-header">
                                            <th>
                                                <span class="userDatatable-title">No</span>
                                            </th>
                                            <th>
                                                <span class="userDatatable-title">Perangkat</span>
                                            </th>
                                            <th>
                                                <span class="userDatatable-title">Lokasi</span>
                                            </th>
                                            <th>
                                                <span class="userDatatable-title">Suhu</span>
                                            </th>
                                            <th>
                                                <span class="userDatatable-title">Timestamp</span>
                                            </th>
                                            <th>
                                                <span class="userDatatable-title">Aksi</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($datas as $data)
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        {{ $data->sensor }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        {{ $data->location }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        {{ $data->suhu }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        {{ $data->sensor }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        {{ $data->created_at }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                            action="#" method="POST">
                                                            <a href="#" class="btn btn-sm btn-primary">EDIT</a>
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-sm btn-danger">HAPUS</button>
                                                        </form>
                                                    </div>
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

            {{-- maps --}}
            <div class="col-xxl-5 mb-25">
                <div class="card card-default card-md mb-4">
                    <div class="card card-default card-md mb-4">
                        <div class="card-header">
                            <h6>maps</h6>
                        </div>
                        <div class="card-body">
                            <div id="map" style="height: 420px"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- secript chart detik --}}
    <script>
        const ctx = document.getElementById('realtime-chart').getContext('2d');

        const chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [],
                datasets: [{
                    label: 'Suhu',
                    data: [],
                    borderWidth: 4,
                    borderColor: 'rgba(153, 0, 153)',
                    tension: 0.4,
                    fill: false
                }]
            },
            options: {
                maintainAspectRatio: false, // Nonaktifkan perbandingan aspek agar dapat mengatur tinggi secara bebas
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 50,
                        ticks: {
                            stepSize: 10
                        }
                    }
                }
            }
        });

        function fetchData() {
            $.ajax({
                url: 'chartSuhuDetik',
                type: 'GET',
                success: function(data) {
                    var waktu = new Date(data.created_at);
                    var jam = waktu.getUTCHours().toString().padStart(2, '0');
                    var menit = waktu.getUTCMinutes().toString().padStart(2, '0');
                    var detik = waktu.getUTCSeconds().toString().padStart(2, '0');
                    chart.data.labels.push(jam + ':' + menit + ':' + detik);
                    if (chart.data.labels.length > 12) {
                        chart.data.labels = chart.data.labels.slice(-12);
                    }
                    // push data suhu
                    chart.data.datasets[0].data.push(data.suhu);
                    if (chart.data.datasets[0].data.length > 12) {
                        chart.data.datasets[0].data = chart.data.datasets[0].data.slice(-12);
                    }
                    chart.update();
                }
            });
        }


        // Memanggil fetchData pertama kali untuk menampilkan data pertama
        fetchData();

        setInterval(fetchData, 5000);
    </script>

    {{-- secript chart jam --}}
    <script>
        const ctx2 = document.getElementById('realtime-chart-2').getContext('2d');

        const chart2 = new Chart(ctx2, {
            type: 'line',
            data: {
                labels: [],
                datasets: [{
                    label: 'Suhu',
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
                        max: 50,
                        ticks: {
                            stepSize: 10
                        }
                    }
                }
            }
        });

        $(document).ready(function() {
            loadDataJam();
        });

        setInterval(loadDataJam, 3600000)

        function loadDataJam() {
            $.ajax({
                url: 'chartSuhuJam',
                type: 'GET',
                success: function(data) {
                    chart2.data.labels = [];
                    chart2.data.datasets[0].data = [];
                    data.forEach(function(data) {
                        var waktu = new Date(data.time);
                        var jam = waktu.getUTCHours().toString().padStart(2, '0');
                        var menit = waktu.getUTCMinutes().toString().padStart(2, '0');
                        var detik = waktu.getUTCSeconds().toString().padStart(2, '0');
                        chart2.data.labels.push(jam + ':' + menit + ':' +
                        detik); // Menambahkan detik ke label
                        if (chart2.data.labels.length > 12) {
                            chart2.data.labels = chart2.data.labels.slice(-12);
                        }
                        chart2.data.datasets[0].data.push(data.suhu);
                    });
                    chart2.update();
                }
            });
        }
    </script>

    {{-- chart hari --}}
    <script>
        const ctx3 = document.getElementById('realtime-chart-3').getContext('2d');

        const chart3 = new Chart(ctx3, {
            type: 'bar',
            data: {
                labels: [],
                datasets: [{
                    label: 'Suhu',
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
                        max: 50,
                        ticks: {
                            stepSize: 10
                        }
                    }
                }
            }
        });

        $(document).ready(function() {
            loadDataHari();
        });

        setInterval(loadDataHari, 3600000)

        function loadDataHari() {
            $.ajax({
                url: 'chartSuhuHari',
                type: 'GET',
                success: function(data) {
                    chart3.data.labels = [];
                    chart3.data.datasets[0].data = [];

                    data.forEach(function(data) {
                        var suhu = data.suhu;

                        var tanggal = new Date(data.created_at).toLocaleDateString('id-ID', {
                            day: 'numeric'
                        });
                        var bulan = new Date(data.created_at).toLocaleDateString('id-ID', {
                            month: 'long'
                        });
                        var tahun = new Date(data.created_at).toLocaleDateString('id-ID', {
                            year: 'numeric'
                        });
                        chart3.data.labels.push(tanggal + ' ' + bulan + ' ' + tahun);
                        if (chart3.data.labels.length > 10) {
                            chart3.data.labels = chart3.data.labels.slice(-10);
                        }
                        chart3.data.datasets[0].data.push(suhu);
                    });
                    chart3.update();
                }
            });
        }
    </script>

    {{-- map --}}
    <script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        var map = L.map('map').setView([{{ $datass->location }}], 15);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        var marker = L.marker([{{ $datass->location }}]).addTo(map);
        marker.bindTooltip("Pawan 1 Ketapang", {
            permanent: true,
            direction: 'bottom'
        }).openTooltip();
    </script>
@endsection
