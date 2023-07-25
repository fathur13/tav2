<!doctype html>
<html lang="en" dir="ltr">

<!-- Mirrored from demo.dashboardmarket.com/hexadash-html/ltr/demo6.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 02 Jun 2023 14:54:40 GMT -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIMBA</title>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600;700&amp;display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ url('public/assets') }}/css/plugin.min.css">
    <link rel="stylesheet" href="{{ url('public/assets') }}/style.css">

    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('public/assets') }}/img/logo/logo-transparant.png">

    <link rel="stylesheet" href="{{ url('public/assets') }}/unicons.iconscout.com/release/v4.0.0/css/line.css">
    {{-- map --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css" />
</head>

<body class="layout-light side-menu">
    <div class="mobile-search">
        <form action="https://demo.dashboardmarket.com/" class="search-form">
            <img src="{{ url('public/assets') }}/img/svg/search.svg" alt="search" class="svg">
            <input class="form-control me-sm-2 box-shadow-none" type="search" placeholder="Search..."
                aria-label="Search">
        </form>
    </div>
    <div class="mobile-author-actions"></div>
    @include('layouts/section/header')
    <main class="main-content">
        @include('layouts/section/sidebar')
        <div class="contents">
            <div class="crm demo6 mb-25">
                <div class="container-fluid">
                    <div class="row ">
                        <div class="col-lg-12">
                            <div class="breadcrumb-main">
                                <h4 class="text-capitalize breadcrumb-title">@yield('header')</h4>
                                <div class="breadcrumb-action justify-content-center flex-wrap">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            @yield('link')
                                            
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        @yield('conten')
                    </div>
                </div>
            </div>
        </div>
        @include('layouts/section/footer')
    </main>
    <div id="overlayer">
        <div class="loader-overlay">
            <div class="dm-spin-dots spin-lg">
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
            </div>
        </div>
    </div>
    <div class="overlay-dark-sidebar"></div>
    <div class="customizer-overlay"></div>
    <div class="customizer-wrapper">
        <div class="customizer">
            <div class="customizer__head">
                <h4 class="customizer__title">Customizer</h4>
                <span class="customizer__sub-title">Customize your overview page layout</span>
                <a href="#" class="customizer-close">
                    <img class="svg" src="img/svg/x2.svg" alt>
                </a>
            </div>
            <div class="customizer__body">
                <div class="customizer__single">
                    <h4>Layout Type</h4>
                    <ul class="customizer-list d-flex layout">
                        <li class="customizer-list__item">
                            <a href="https://demo.dashboardmarket.com/hexadash-html/ltr" class="active">
                                <img src="{{ url('public/assets') }}/img/ltr.png" alt>
                                <i class="fa fa-check-circle"></i>
                            </a>
                        </li>
                        <li class="customizer-list__item">
                            <a href="https://demo.dashboardmarket.com/hexadash-html/rtl">
                                <img src="{{ url('public/assets') }}/img/rtl.png" alt>
                                <i class="fa fa-check-circle"></i>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="customizer__single">
                    <h4>Sidebar Type</h4>
                    <ul class="customizer-list d-flex l_sidebar">
                        <li class="customizer-list__item">
                            <a href="#" data-layout="light" class="dark-mode-toggle active">
                                <img src="{{ url('public/assets') }}/img/light.png" alt>
                                <i class="fa fa-check-circle"></i>
                            </a>
                        </li>
                        <li class="customizer-list__item">
                            <a href="#" data-layout="dark" class="dark-mode-toggle">
                                <img src="{{ url('public/assets') }}/img/dark.png" alt>
                                <i class="fa fa-check-circle"></i>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="customizer__single">
                    <h4>Navbar Type</h4>
                    <ul class="customizer-list d-flex l_navbar">
                        <li class="customizer-list__item">
                            <a href="#" data-layout="side" class="active">
                                <img src="{{ url('public/assets') }}/img/side.png" alt>
                                <i class="fa fa-check-circle"></i>
                            </a>
                        </li>
                        <li class="customizer-list__item top">
                            <a href="#" data-layout="top">
                                <img src="{{ url('public/assets') }}/img/top.png" alt>
                                <i class="fa fa-check-circle"></i>
                            </a>
                        </li>
                        <li class="colors"></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgYKHZB_QKKLWfIRaYPCadza3nhTAbv7c"></script> --}}

    <script src="{{ url('public/assets') }}/js/plugins.min.js"></script>
    <script src="{{ url('public/assets') }}/js/script.min.js"></script>

</body>

<!-- Mirrored from demo.dashboardmarket.com/hexadash-html/ltr/demo6.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 02 Jun 2023 14:55:45 GMT -->

</html>
