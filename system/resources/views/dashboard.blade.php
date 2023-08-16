@extends('layouts/app')
@section('link')
    <li class="breadcrumb-item active"><a href="#"></i>Dashboard</a></li>
@endsection
@section('header', 'Dashboard')
@section('conten')
    {{-- panggil file jquery untuk proses realtime --}}
    <script type="text/javascript" src="{{ url('public/assets/jquery/jquery.min.js') }}"></script>

    {{-- ajax untuk realtime --}}
    <script type="text/javascript">
        $(document).ready(function() {
            setInterval(function() {
                $("#suhu").load("{{ url('bacasuhu') }}");
                $("#kelembapan").load("{{ url('bacakelembapan') }}");
                // $("#cuaca").load("{{ url('bacacuaca') }}");
                $.get("{{ url('bacacuaca') }}", function(data) {
                    // Memeriksa apakah sedang hujan atau tidak
                    if (data == "1") {
                        // Mengubah gambar menjadi gambar hujan
                        $("#cuaca-img").attr("src",
                            "{{ url('public/assets/img/cuaca/hujan.png') }}");
                        // Mengubah teks menjadi "Hujan"
                        $("#cuaca-text").text("Hujan!");
                        // Mengubah latar belakang menjadi gambar hujan
                        $("#background-img").css("background-image",
                            "url({{ url('public/assets/img/cuaca/mendung.jpg') }})");
                    } else if (data == "2") {
                        // Mengubah gambar menjadi gambar tidak hujan
                        $("#cuaca-img").attr("src",
                            "{{ url('public/assets/img/cuaca/cerah.png') }}");
                        // Mengubah teks menjadi "Tidak hujan"
                        $("#cuaca-text").text("Tidak Hujan!");
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

    {{-- data ketinggian air  --}}
    <div class="col-lg-6 ">
        <div class="col-xxl-12 col-sm-6 mb-25">
            <figure class="feature-cards7 feature-cards7--2">
                <div class="banner-card" id="kid-status-card">
                    <div class="banner-card__top align-center-v justify-content-between">
                        <h4 class="banner-card__title">
                            <svg xmlns="http://www.w3.org/2000/svg" id="Group_1816" data-name="Group 1816" width="12.645"
                                height="15.851" viewBox="0 0 12.645 15.851" class="svg replaced-svg">
                                <g id="Group_1815" data-name="Group 1815" transform="translate(0)">
                                    <path id="Path_1276" data-name="Path 1276"
                                        d="M54.353,10.687l-.008-.008L48.594,4.948V2.864a2.864,2.864,0,1,0-5.728,0V8.35l-.073.077a3.338,3.338,0,0,0,0,4.717l1.73,1.73a3.334,3.334,0,0,0,4.717,0l4.1-4.1.461.454a.383.383,0,0,0,.546-.538ZM43.634,2.868a2.1,2.1,0,0,1,4.19,0V4.183l-.8-.8a.383.383,0,0,0-.538.546l.4.4L43.634,7.581Zm4.433,6.066a.775.775,0,1,1-.773.777A.776.776,0,0,1,48.067,8.934Zm.634,5.4a2.567,2.567,0,0,1-3.629,0l0,0-1.73-1.73a2.571,2.571,0,0,1,0-3.629l.231-.231,3.864-3.867.392.4V8.189a1.543,1.543,0,1,0,1.784,1.526,1.517,1.517,0,0,0-1.015-1.449V6.036l4.21,4.19Z"
                                        transform="translate(-41.818)" fill="#fff"></path>
                                </g>
                            </svg>
                            <span>Data Ketinggian Air</span>
                        </h4>
                        <div class="banner-card__action">
                            <div class="more">
                                <div class="card__more-action dropdown dropdown-click">
                                    <button class="btn-link border-0 bg-transparent p-0 color-svgDF-white"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="svg replaced-svg">
                                            <circle cx="12" cy="12" r="1"></circle>
                                            <circle cx="19" cy="12" r="1"></circle>
                                            <circle cx="5" cy="12" r="1"></circle>
                                        </svg>
                                    </button>
                                    <div class="dropdown-default dropdown-bottomLeft dropdown-menu-right dropdown-menu">
                                        <a class="dropdown-item" href="{{ url('ketinggian_air') }}">view</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="banner-card__top align-center-v justify-content-between">
                        <div>
                            <h5 style="color: #fff">Status Ketinggian Muka Air</h5>
                            <h1
                                style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; color:#fff">
                                <span id="kid-status">-</span>
                            </h1>
                        </div>
                        <div class="text-right">
                            <h6 style="font-weight:bold;color:#fff">Ketinggian Air</h6>
                            <h2 style="font-weight:bold; font-size:3em; color:#fff"><span id="ketinggian-air"></span>cm</h2>
                        </div>
                    </div>
                </div>
            </figure>
        </div>
        {{-- <div class="col-xxl-12 col-sm-6 mb-25">
            <figure class="feature-cards7 feature-cards7--2">
                <div class="banner-card" id="kid-status-card">
                    <div class="banner-card__top align-center-v justify-content-between">
                        <div>
                            <h5 style="color: #fff">Status Ketinggian Muka Air</h5>
                            <h1
                                style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; color:#fff">
                                <span id="kid-status">-</span>
                            </h1>
                        </div>
                        <div class="text-right">
                            <h6 style="font-weight:bold;color:#fff">Ketinggian Air</h6>
                            <h2 style="font-weight:bold; font-size:3em; color:#fff"><span id="ketinggian-air"></span>cm</h2>
                        </div>
                    </div>
                </div>
            </figure>
        </div> --}}

        <div class="col-xxl-12 col-lg-6 mb-25">
            <div class="card border-0 chartLine-po-details h-100">
                <div class="card-header border-0 px-25 pt-25 pb-30">
                    <div class="chartLine-po-details__overview-content w-100">
                        <div class=" chartLine-po-details__content d-flex flex-wrap justify-content-between">
                            <div class="chartLine-po-details__titlebar">
                                <h1>Data Suhu dan Kelembapan</h1>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="wp-chart">
                        <div class="parentContainer">
                            <div>
                                <div class="col-xl-12" style="margin-bottom: 10px">
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

    {{-- data cuaca dan data suhu dan kelembapan --}}
    <div class="col-xxl-6 col-lg-6 mb-25">
        <div class="card revenueChartTwo border-0">
            <div class="card-header">
                <h6>Data Cuaca Suhu Kelembapan</h6>
                <div class="card-extra">
                    <div class="dropdown dropleft">
                        <a href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <img src="{{ url('public/assets') }}/img/svg/more-horizontal.svg" alt="more-horizontal"
                                class="svg">
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ url('suhu') }}">View Suhu</a>
                            <a class="dropdown-item" href="{{ url('kelembapan') }}">View Kelembapan</a>
                            <a class="dropdown-item" href="{{ url('cuaca') }}">View Cuaca</a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="background-img" class="text-center p-5"
                style="background-image: url({{ url('public/assets/img/cuaca/mendung.jpg') }});">
                <img id="cuaca-img" src="{{ url('public/assets/img/cuaca/hujan.png') }}" width="100" alt="">
                <h3 id="cuaca-text" class="mt-3 mb-0 text-white"></h3>
            </div>
            <div class="card-body px-sm-50 pb-sm-30 pt-sm-50 px-30 pb-30 pt-25">
                <div class="row" style="max-width: 100%; margin: 0 auto;">
                    <div class="col-md-6">
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
                    <div class="col-md-6">
                        <div
                            style="border-radius: 50%; margin: 0 auto; width: 273px; height: 273px; border: 6px solid #734ed0; color: #000000; text-align: center; font: 32px Arial, sans-serif; display: flex; flex-direction: column; justify-content: center;">
                            <img src="{{ url('public/assets') }}/img/sensor/humidity.png" alt="Humidity Icon"
                                style="width: 80px; height: 80px; margin: 20px auto 0; display: block; width:30px;height:30px;">
                            <h4 style="margin: 0; font-size: 24px; font-weight: bold; color: #734ed0;">
                                Kelembapan
                            </h4>
                            <div
                                style="display: flex; justify-content: center; align-items: center; flex-direction: column; height: 100%;">
                                <span id="kelembapan" style="font-size: 64px; font-weight: bold;"></span>
                                <span style="font-size: 24px; font-weight: bold;">%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- table  --}}
    <div class="col-xxl-6 col-lg-6 mb-25" style="height: 10rem;">
        <div class=" card card-md mb-4">
            <div class="card-header color-dark fw-500">
                Data Per Jam <a href="{{ url('export') }}" class="btn btn-sm btn-success float-right">Ekspor
                    Data</a>
            </div>
            <div class="card-body p-0">
                <div class="table4 p-25 mb-30">
                    <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                        <table class="table mb-5">
                            <thead>
                                <tr class="userDatatable-header">
                                    <th>
                                        <span class="userDatatable-title">No</span>
                                    </th>
                                    <th>
                                        <span class="userDatatable-title">Lokasi</span>
                                    </th>
                                    <th>
                                        <span class="userDatatable-title">Ketinggi Air</span>
                                    </th>
                                    <th>
                                        <span class="userDatatable-title">Suhu</span>
                                    </th>
                                    <th>
                                        <span class="userDatatable-title">Kelembapan</span>
                                    </th>
                                    <th>
                                        <span class="userDatatable-title">Cuaca</span>
                                    </th>
                                    <th>
                                        <span class="userDatatable-title">Timestamp</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($datas as $data)
                                    <tr>
                                        <td>
                                            {{ $no++ }}
                                        </td>
                                        <td>
                                            <div class="userDatatable-content">
                                                {{ $data->sensor }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="userDatatable-content">
                                                {{ $data->ketinggian_air }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="userDatatable-content">
                                                {{ $data->suhu }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="userDatatable-content">
                                                {{ $data->kelembapan }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="userDatatable-content">
                                                @if ($data->status_air == 1)
                                                    Hujan
                                                @elseif ($data->status_air == 2)
                                                    Tidak Hujan
                                                @else
                                                    Data Tidak Valid
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="userDatatable-content">
                                                {{ $data->created_at }}
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div style="margin-left: 2%; font-size: 12px;">
                    <p>Keterangan :</p>
                    <div style="display: flex; align-items: center;">
                        <div style="width: 20px; height: 20px; background-color: #ff0000; margin-right: 10px; border-radius: 50%;"></div>
                        <p><i class="fa fa-exclamation-triangle" style="color: #ff0000;"></i> Bahaya (ketinggian air antara 70 hingga 88)</p>
                    </div>
                    <div style="display: flex; align-items: center;">
                        <div style="width: 20px; height: 20px; background-color: #ffa500; margin-right: 10px; border-radius: 50%;"></div>
                        <p><i class="fa fa-exclamation-circle" style="color: #ffa500;"></i> Siaga (ketinggian air antara 50 hingga 69)</p>
                    </div>
                    <div style="display: flex; align-items: center;">
                        <div style="width: 20px; height: 20px; background-color: #ffff00; margin-right: 10px; border-radius: 50%;"></div>
                        <p><i class="fa fa-exclamation" style="color: #ffff00;"></i> Warning (ketinggian air antara 20 hingga 49)</p>
                    </div>
                    <div style="display: flex; align-items: center;">
                        <div style="width: 20px; height: 20px; background-color: #0000ff; margin-right: 10px; border-radius: 50%;"></div>
                        <p><i class="fa fa-check-circle" style="color: #0000ff;"></i> Normal (ketinggian air kurang dari 20)</p>
                    </div>
                </div>
                

            </div>
        </div>
    </div>

    {{-- map --}}
    <div class="col-xxl-6 mb-25">
        <div class="card card-default card-md mb-4">
            <div class="card-header">
                <h6>maps</h6>
            </div>
            <div class="card-body">
                <div id="map"></div>
            </div>
        </div>
    </div>
    {{--  script warning --}}
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
                        // Mengubah nilai data ketinggian air dengan mengurangi 200
                        // data.ketinggian_air;

                        // Jika nilai ketinggian air di atas 200 cm, ubah menjadi 0


                        // Menampilkan status KID dan ketinggian air terbaru pada halaman web
                        $('#kid-status').html(data.status);
                        $('#kid-status-card').removeClass(
                            'bg-danger bg-warning bg-info bg-success').addClass('bg-' + data
                            .color);
                        $('#ketinggian-air').html(Math.abs(data.ketinggian_air).toFixed(2));

                        // Menambahkan border warna merah pada kartu jika status KID adalah "Tenggelam"
                        if (data.status === "Tenggelam") {
                            $('#kid-status-card').addClass('border-danger');
                        } else {
                            $('#kid-status-card').removeClass('border-danger');
                        }
                    }
                });
            }, 1000);
        });
    </script>

    {{-- secript chart --}}
    <script>
        const ctx = document.getElementById('realtime-chart').getContext('2d');

        const chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [],
                datasets: [{
                        label: 'Kelembapan (%)',
                        data: [],
                        borderWidth: 4,
                        borderColor: 'rgba(75, 192, 192, 1)',
                        tension: 0.4,
                        fill: false
                    },
                    {
                        label: 'Suhu (c)',
                        data: [],
                        borderWidth: 4,
                        borderColor: 'rgba(153, 0, 153)',
                        tension: 0.4,
                        fill: false
                    },
                    {
                        label: 'Ketinggian Air (cm)',
                        data: [],
                        borderWidth: 4,
                        borderColor: 'rgba(255, 0, 0)',
                        tension: 0.4,
                        fill: false
                    }
                ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 200,
                        ticks: {
                            stepSize: 40
                        }
                    }
                }
            }
        });


        function fetchData() {
            $.ajax({
                url: 'apichart',
                type: 'GET',
                success: function(data) {
                    chart.data.labels.push(data.created_at);
                    if (chart.data.labels.length > 5) {
                        chart.data.labels = chart.data.labels.slice(-5);
                    }

                    // push data kelembapan sinyal
                    chart.data.datasets[0].data.push(data.kelembapan_sinyal);
                    if (chart.data.datasets[0].data.length > 5) {
                        chart.data.datasets[0].data = chart.data.datasets[0].data.slice(-5);
                    }

                    // push data suhu
                    chart.data.datasets[1].data.push(data.suhu);
                    if (chart.data.datasets[1].data.length > 5) {
                        chart.data.datasets[1].data = chart.data.datasets[1].data.slice(-5);
                    }

                    // push data ketinggian air
                    // var positiveValue = Math.abs(data.ketinggian_air -
                    //     200); // Mengambil nilai mutlak dan mengurangi 200
                    chart.data.datasets[2].data.push(data.ketinggian_air);
                    if (chart.data.datasets[2].data.length > 5) {
                        chart.data.datasets[2].data = chart.data.datasets[2].data.slice(-5);
                    }

                    chart.update();
                }
            });
        }


        // Memanggil fetchData pertama kali untuk menampilkan data pertama
        fetchData();

        setInterval(fetchData, 5000); // Mengatur interval pemanggilan fetchData setiap 5 detik
    </script>

    <style>
        .dynamic-table {
            max-height: 400px;
            /* Tentukan tinggi maksimal tabel */
            overflow-y: auto;
            /* Tambahkan scroll vertikal jika diperlukan */
        }

        #map {
            height: 600px;
        }

        .bg-orange {
            background-color: orange;
        }
    </style>

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
