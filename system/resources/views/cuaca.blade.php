@extends('layouts/app')
@section('link')
    <li class="breadcrumb-item"><a href="#"></i>Data</a></li>
    <li class="breadcrumb-item active" aria-current="page">cuaca
    </li>
@endsection
@section('header', 'cuaca')
@section('conten')
    {{-- panggil file jquery untuk proses realtime --}}
    <script type="text/javascript" src="{{ url('public/assets/jquery/jquery.min.js') }}"></script>
    {{-- ajax untuk realtime --}}
    <script type="text/javascript">
        $(document).ready(function() {
            setInterval(function() {
                $.get("{{ url('bacacuaca') }}", function(data) {
                    // Memeriksa apakah sedang hujan atau tidak
                    if (data == "1") {
                        // Mengubah gambar menjadi gambar hujan
                        $("#cuaca-img").attr("src",
                            "{{ url('public/assets/img/cuaca/hujan.png') }}");
                        // Mengubah teks menjadi "Hujan"
                        $("#cuaca-text").text("is raining!");
                        // Mengubah latar belakang menjadi gambar hujan
                        $("#background-img").css("background-image",
                            "url({{ url('public/assets/img/cuaca/mendung.jpg') }})");
                    } else if (data == "2") {
                        // Mengubah gambar menjadi gambar tidak hujan
                        $("#cuaca-img").attr("src",
                            "{{ url('public/assets/img/cuaca/cerah.png') }}");
                        // Mengubah teks menjadi "Tidak hujan"
                        $("#cuaca-text").text("is not raining!");
                        // Mengubah latar belakang menjadi gambar cerah
                        $("#background-img").css("background-image",
                            "url({{ url('public/assets/img/cuaca/backgroun-cerah.jpg') }})");
                    } else {
                        // Data tidak valid, mengubah gambar menjadi gambar default
                        $("#cuaca-img").attr("src",
                            "{{ url('public/assets/img/cuaca/default.png') }}");
                        // Mengubah teks menjadi "Data tidak valid"
                        $("#cuaca-text").text("Invalid data");
                        // Mengubah latar belakang menjadi gambar default
                        $("#background-img").css("background-image",
                            "url({{ url('public/assets/img/cuaca/default-background.jpg') }})");
                    }
                });
            }, 1000);

        })
    </script>
    <div class="container-fluid">
        <div class="row ">
            {{-- chart --}}
            <div class="col-xxl-8 col-lg-8 mb-25">
                <div class="card revenueChartTwo border-0">
                    <div class="card-header">
                        <h6>Cuaca</h6>
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

            {{-- data cuaca dan data kelembapan dan kelembapan --}}
            <div class="col-xxl-4 col-lg-4 mb-25">
                <div class="card revenueChartTwo border-0">
                    <div class="card-header">
                        <h6>Data Cuaca</h6>
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
                    <div class="card revenueChartTwo border-0" style="height:23rem">
                        <div id="background-img" class="text-center p-5"
                            style="background-image: url({{ url('public/assets/img/cuaca/mendung.jpg') }}); height: 23rem">
                            <img id="cuaca-img" src="{{ url('public/assets/img/cuaca/hujan.png') }}" width="100"
                                alt="">
                            <h3 id="cuaca-text" class="mt-3 mb-0 text-white"></h3>
                        </div>
                    </div>
                </div>
            </div>

            {{-- table  --}}
            <div class="col-xxl-7 col-lg-6 mb-25">
                <div class="card p-0">
                    <div class="card-header color-dark fw-500">
                        Data <a href="{{ url('cuaca/export') }}" class="btn btn-sm btn-success float-right">Ekspor
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
                                                <span class="userDatatable-title">Cuaca</span>
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
                                                        {{ $data->status_air }}
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
                    <div class="card-header">
                        <h6>maps</h6>
                    </div>
                    <div class="card-body">
                        <div id="map" style="height: 450px"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- secript chart detik --}}
    {{-- <script>
        const ctx = document.getElementById('realtime-chart').getContext('2d');

        const chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [],
                datasets: [{
                    label: 'Intensitas Hujan',
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
                url: 'chartCuacaDetik',
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
                    // push data kelembapan
                    chart.data.datasets[0].data.push(data.status_air);
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
    </script> --}}

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
