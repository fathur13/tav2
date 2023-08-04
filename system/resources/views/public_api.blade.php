@extends('layouts/app')
@section('link')
    <li class="breadcrumb-item"><a href="#"></i>API</a></li>
    <li class="breadcrumb-item active" aria-current="page">public_api
    </li>
@endsection
@section('header', 'Public API')
@section('conten')
    {{-- panggil file jquery untuk proses realtime --}}
    <script type="text/javascript" src="{{ url('public/assets/jquery/jquery.min.js') }}"></script>
    <div class="container-fluid">
        <div class="row ">
            <div class="col-12 mt-30">
                <div class="card border-0">
                    <div class="card-header">
                        <h6>LINK API</h6>
                        <div class="card-extra">
                            <div class="dropdown dropleft">
                                <a href="#" role="button" id="Today" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <img src="{{ url('public/assets') }}/img/svg/more-horizontal.svg" alt="more-horizontal" class="svg">
                                </a>
                                <div class="dropdown-menu" aria-labelledby="Today">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0 pe-2">
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="st_matrics-today" role="tabpanel"
                                aria-labelledby="st_matrics-today-tab">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-social">
                                        <thead>
                                            <tr>
                                                <th>API</th>
                                                <th>Action</th>
                                                <th>Value</th>
                                                <th class="col-md-4">Link</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><span>Sensor Data API</span></td>
                                                <td>
                                                    <button type="button" class="btn btn-primary" id="sensor-link">Show
                                                        Link</button>
                                                </td>
                                                <td></td>
                                                <td>
                                                    <span>
                                                        <div id="api-url" style="display:none;"></div>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><span>Get Data by Date Range API</span></td>
                                                <td>
                                                    <button type="button" class="btn btn-primary" id="date-range-link">Show
                                                        Link</button>
                                                </td>
                                                <td>
                                                    <div class="input-group mb-3">
                                                        <input type="date" class="form-control" placeholder="Start Date"
                                                            aria-label="Start Date" aria-describedby="basic-addon2"
                                                            id="start-date-input">
                                                        <span class="input-group-text" id="basic-addon2">to</span>
                                                        <input type="date" class="form-control" placeholder="End Date"
                                                            aria-label="End Date" aria-describedby="basic-addon2"
                                                            id="end-date-input">
                                                    </div>
                                                </td>
                                                <td>
                                                    <span>
                                                        <div id="date-range-api-url" style="display:none;"></div>
                                                    </span>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td><span>Get Data by ID API</span></td>
                                                <td>
                                                    <button type="button" class="btn btn-primary" id="id-link">Show
                                                        Link</button>
                                                </td>
                                                <td>
                                                    <span>
                                                        <input type="text" id="id-input" placeholder="Enter ID">
                                                    </span>
                                                </td>
                                                <td>
                                                    <span>
                                                        <div id="id-api-url" style="display:none;"></div>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><span>Get Latest Data API</span></td>
                                                <td>
                                                    <button type="button" class="btn btn-primary" id="latest-link">Show
                                                        Link</button>
                                                </td>
                                                <td></td>
                                                <td>
                                                    <span>
                                                        <div id="latest-api-url" style="display:none;"></div>
                                                    </span>
                                                </td>
                                            </tr>

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

    <script>
        // Mengambil URL base dari aplikasi
        const baseUrl = "{{ url('/') }}";

        // Ketika tombol ditekan, tampilkan atau sembunyikan link API pada kolom "Link"
        const sensorLinkButton = document.getElementById("sensor-link");
        const apiUrlDiv = document.getElementById("api-url");
        sensorLinkButton.addEventListener("click", function() {
            const apiLink = baseUrl + "/api/sensor";
            const apiUrlHtml = '<a href="' + apiLink + '" target="_blank">' + apiLink + '</a>';
            if (apiUrlDiv.style.display === "block") {
                apiUrlDiv.style.display = "none";
                sensorLinkButton.innerHTML = "Show Link";
            } else {
                apiUrlDiv.innerHTML = apiUrlHtml;
                apiUrlDiv.style.display = "block";
                sensorLinkButton.innerHTML = "Hide Link";
            }
        });

        // Ketika tombol ditekan, tampilkan atau sembunyikan link API pada kolom "Link"
        const idLinkButton = document.getElementById("id-link");
        const idInputField = document.getElementById("id-input");
        const idApiUrlDiv = document.getElementById("id-api-url");

        idLinkButton.addEventListener("click", function() {
            const idValue = idInputField.value;
            const apiLink = baseUrl + "/api/sensor/" + idValue;
            const apiUrlHtml = '<a href="' + apiLink + '" target="_blank">' + apiLink + '</a>';

            if (idApiUrlDiv.style.display === "block") {
                idApiUrlDiv.style.display = "none";
                idLinkButton.innerHTML = "Show Link";
            } else {
                idApiUrlDiv.innerHTML = apiUrlHtml;
                idApiUrlDiv.style.display = "block";
                idLinkButton.innerHTML = "Hide Link";
            }
        });


        const latestLinkButton = document.getElementById("latest-link");
        const latestApiUrlDiv = document.getElementById("latest-api-url");
        latestLinkButton.addEventListener("click", function() {
            const latestApiLink = baseUrl + "/api/sensors/latest";
            const latestApiUrlHtml = '<a href="' + latestApiLink + '" target="_blank">' + latestApiLink + '</a>';
            if (latestApiUrlDiv.style.display === "block") {
                latestApiUrlDiv.style.display = "none";
                latestLinkButton.innerHTML = "Show Link";
            } else {
                latestApiUrlDiv.innerHTML = latestApiUrlHtml;
                latestApiUrlDiv.style.display = "block";
                latestLinkButton.innerHTML = "Hide Link";
            }
        });

        const dateRangeLinkButton = document.getElementById("date-range-link");
        const dateRangeApiUrlDiv = document.getElementById("date-range-api-url");
        const startDateInput = document.getElementById("start-date-input");
        const endDateInput = document.getElementById("end-date-input");

        dateRangeLinkButton.addEventListener("click", function() {
            const startDate = startDateInput.value;
            const endDate = endDateInput.value;
            const dateRangeApiLink = baseUrl + "/api/sensors/date_range?start_date=" + startDate + "&end_date=" +
                endDate;
            const dateRangeApiUrlHtml = '<a href="' + dateRangeApiLink + '" target="_blank">' + dateRangeApiLink +
                '</a>';
            if (dateRangeApiUrlDiv.style.display === "block") {
                dateRangeApiUrlDiv.style.display = "none";
                dateRangeLinkButton.innerHTML = "Show Link";
            } else {
                dateRangeApiUrlDiv.innerHTML = dateRangeApiUrlHtml;
                dateRangeApiUrlDiv.style.display = "block";
                dateRangeLinkButton.innerHTML = "Hide Link";
            }
        });
    </script>
@endsection
