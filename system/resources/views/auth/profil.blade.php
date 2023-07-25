<!doctype html>
<html lang="en" dir="ltr">

<!-- Mirrored from demo.dashboardmarket.com/hexadash-html/ltr/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 02 Jun 2023 14:57:02 GMT -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIMBA - Profile</title>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600;700&amp;display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ url('public/assets') }}/css/plugin.min.css">
    <link rel="stylesheet" href="{{ url('public/assets') }}/style.css">

    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('public/assets') }}img/favicon.png">

    <link rel="stylesheet" href="{{ url('public/assets') }}/unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>

<body class="layout-light side-menu">
    <header class="header-top">
        <nav class="navbar navbar-light">
            <div class="navbar-left">
                <div class="logo-area">
                    <a class="navbar-brand" href="index.html">
                        <img class="dark" src="{{ url('public/assets') }}/img/logo/logo-dark.png" alt="logo">
                        <img class="light" src="{{ url('public/assets') }}/img/logo/logo-white.png" alt="logo">
                    </a>
                    <a href="#" class="sidebar-toggle">
                        <img class="svg" src="{{ url('public/assets') }}/img/svg/align-center-alt.svg"
                            alt="img"></a>
                </div>
            </div>

            <div class="navbar-right">
                <ul class="navbar-right__menu">
                    <li class="enable-dark-mode">
                        <a href="#">
                            <i class="uil uil-moon"></i>
                        </a>
                    </li>

                    <li class="nav-author">
                        <div class="dropdown-custom">
                            <a href="javascript:;" class="nav-item-toggle"><img
                                    src="{{ url('public/assets') }}/img/author-nav.jpg" alt class="rounded-circle">
                                <span class="nav-item__title">{{ Auth::user()->name }}<i
                                        class="las la-angle-down nav-item__arrow"></i></span>
                                {{-- <span class="nav-item__title"><i
                                        class="las la-angle-down nav-item__arrow"></i></span> --}}

                            </a>
                            <div class="dropdown-parent-wrapper">
                                <div class="dropdown-wrapper">
                                    <div class="nav-author__info">
                                        <div class="author-img">
                                            <img src="{{ url('public/assets') }}/img/author-nav.jpg" alt
                                                class="rounded-circle">
                                        </div>
                                        <div>
                                            <h6>{{ Auth::user()->name }}</h6>
                                            <span>{{ Auth::user()->email }}</span>
                                        </div>
                                    </div>
                                    <div class="nav-author__options">
                                        <ul>
                                            <li>
                                                <a href>
                                                    <i class="uil uil-user"></i> Profile</a>
                                            </li>
                                            <li>
                                                <a href>
                                                    <i class="uil uil-bell"></i> Help</a>
                                            </li>
                                        </ul>
                                        <a href="{{ url('logout') }}" class="nav-author__signout">
                                            <i class="uil uil-sign-out-alt"></i> Sign Out</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </li>

                </ul>

                <div class="navbar-right__mobileAction d-md-none">
                    <a href="#" class="btn-search">
                        <img src="{{ url('public/assets') }}/img/svg/search.svg" alt="search"
                            class="svg feather-search">
                        <img src="{{ url('public/assets') }}/img/svg/x.svg" alt="x" class="svg feather-x"></a>
                    <a href="#" class="btn-author-action">
                        <img class="svg" src="{{ url('public/assets') }}/img/svg/more-vertical.svg"
                            alt="more-vertical"></a>
                </div>
            </div>

        </nav>
    </header>

    <main class="main-content">
        <div class="contents">
            <div class="crm demo6 mb-25">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="breadcrumb-main">
                                <h4 class="text-capitalize breadcrumb-title">My profile</h4>
                                <div class="breadcrumb-action justify-content-center flex-wrap">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#"><i
                                                        class="uil uil-estate"></i>Home</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">My profile</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <aside class="profile-sider">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <div class="account-profile">
                                            <div class="ap-img w-100 d-flex justify-content-center">
                                                <img class="ap-img__main rounded-circle mb-3  wh-120 d-flex bg-opacity-primary"
                                                    src="{{ url('public/assets') }}/img/author/profile.png" alt="profile">
                                            </div>
                                            <div class="ap-nameAddress pb-3 pt-1">
                                                <h5 class="ap-nameAddress__title">{{ Auth::user()->name }}</h5>
                                                <p class="ap-nameAddress__subTitle fs-14 m-0">{{ Auth::user()->email }}</p>
                                            </div>
                                            <div
                                                class="ap-button button-group d-flex justify-content-center flex-wrap">
                                                <button type="button"
                                                    class="border text-capitalize px-25 color-gray transparent radius-md">
                                                    <img class="svg" src="{{ url('public/assets') }}/img/svg/mail.svg"
                                                        alt="mail">message</button>
                                                <button
                                                    class="btn btn-primary btn-default btn-squared text-capitalize  px-25"><img
                                                        src="{{ url('public/assets') }}/img/svg/user-plus.svg" alt="user-plus" class="svg">
                                                    follow
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-footer mt-20 pt-20 pb-20 px-0 bg-transparent">
                                            <div class="profile-overview d-flex justify-content-between flex-wrap">
                                                <div class="po-details">
                                                    <h6 class="po-details__title pb-1">$72,572</h6>
                                                    <span class="po-details__sTitle">Total Revenue</span>
                                                </div>
                                                <div class="po-details">
                                                    <h6 class="po-details__title pb-1">3,257</h6>
                                                    <span class="po-details__sTitle">order</span>
                                                </div>
                                                <div class="po-details">
                                                    <h6 class="po-details__title pb-1">74</h6>
                                                    <span class="po-details__sTitle">Products</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="card mb-25">
                                    <div class="user-bio border-bottom">
                                        <div class="card-header border-bottom-0 pt-sm-30 pb-sm-0  px-md-25 px-3">
                                            <div class="profile-header-title">
                                                User Bio
                                            </div>
                                        </div>
                                        <div class="card-body pt-md-1 pt-0">
                                            <div class="user-bio__content">
                                                <p class="m-0">Nam malesuada dolor tellus pretium amet was
                                                    hendrerit facilisi id
                                                    vitae enim
                                                    sed ornare
                                                    there suspendisse sed orci neque ac sed aliquet risus faucibus in
                                                    pretium
                                                    molestie nisl
                                                    tempor quis odio habitant.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="user-info border-bottom">
                                        <div class="card-header border-bottom-0 pt-sm-25 pb-sm-0  px-md-25 px-3">
                                            <div class="profile-header-title">
                                                Contact info
                                            </div>
                                        </div>
                                        <div class="card-body pt-md-1 pt-0">
                                            <div class="user-content-info">
                                                <p class="user-content-info__item">
                                                    <img class="svg" src="{{ url('public/assets') }}/img/svg/mail.svg" alt="mail"><a
                                                        href="https://demo.dashboardmarket.com/cdn-cgi/l/email-protection"
                                                        class="__cf_email__"
                                                        data-cfemail="47042b263e33282907223f262a372b226924282a">[email&#160;protected]</a>
                                                </p>
                                                <p class="user-content-info__item">
                                                    <img src="{{ url('public/assets') }}/img/svg/phone.svg" alt="phone" class="svg">+44
                                                    (0161) 347
                                                    8854
                                                </p>
                                                <p class="user-content-info__item mb-0">
                                                    <img src="{{ url('public/assets') }}/img/svg/globe.svg" alt="globe"
                                                        class="svg">www.example.com
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="user-skils border-bottom">
                                        <div class="card-header border-bottom-0 pt-sm-25 pb-sm-0  px-md-25 px-3">
                                            <div class="profile-header-title">
                                                Skills
                                            </div>
                                        </div>
                                        <div class="card-body pt-md-1 pt-0">
                                            <ul class="user-skils-parent">
                                                <li class="user-skils-parent__item">
                                                    <a href="#">UI/UX</a>
                                                </li>
                                                <li class="user-skils-parent__item">
                                                    <a href="#">Branding</a>
                                                </li>
                                                <li class="user-skils-parent__item">
                                                    <a href="#">product design</a>
                                                </li>
                                                <li class="user-skils-parent__item">
                                                    <a href="#">Application</a>
                                                </li>
                                                <li class="user-skils-parent__item mb-0">
                                                    <a href="#">web design</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="db-social">
                                        <div class="card-header border-bottom-0 pt-sm-25 pb-sm-0  px-md-25 px-3">
                                            <div class="profile-header-title">
                                                Social Profiles
                                            </div>
                                        </div>
                                        <div class="card-body pt-md-1 pt-0">
                                            <ul class="db-social-parent mb-0">
                                                <li class="db-social-parent__item">
                                                    <a class="color-facebook hover-facebook wh-44 fs-18"
                                                        href="#">
                                                        <i class="lab la-facebook-f"></i>
                                                    </a>
                                                </li>
                                                <li class="db-social-parent__item">
                                                    <a class="color-twitter hover-twitter wh-44 fs-18" href="#">
                                                        <i class="lab la-twitter"></i>
                                                    </a>
                                                </li>
                                                <li class="db-social-parent__item">
                                                    <a class="color-ruby hover-ruby  wh-44 fs-18" href="#">
                                                        <i class="las la-basketball-ball"></i>
                                                    </a>
                                                </li>
                                                <li class="db-social-parent__item">
                                                    <a class="color-instagram hover-instagram wh-44 fs-18"
                                                        href="#">
                                                        <i class="lab la-instagram"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer-wrapper">
            <div class="footer-wrapper__inside">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="footer-copyright">
                                <p><span>© 2023</span><a href="#">Sovware</a>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="footer-menu text-end">
                                <ul>
                                    <li>
                                        <a href="#">About</a>
                                    </li>
                                    <li>
                                        <a href="#">Team</a>
                                    </li>
                                    <li>
                                        <a href="#">Contact</a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </footer>
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
                                <img src="img/ltr.png" alt>
                                <i class="fa fa-check-circle"></i>
                            </a>
                        </li>
                        <li class="customizer-list__item">
                            <a href="https://demo.dashboardmarket.com/hexadash-html/rtl">
                                <img src="img/rtl.png" alt>
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
                                <img src="img/light.png" alt>
                                <i class="fa fa-check-circle"></i>
                            </a>
                        </li>
                        <li class="customizer-list__item">
                            <a href="#" data-layout="dark" class="dark-mode-toggle">
                                <img src="img/dark.png" alt>
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
                                <img src="img/side.png" alt>
                                <i class="fa fa-check-circle"></i>
                            </a>
                        </li>
                        <li class="customizer-list__item top">
                            <a href="#" data-layout="top">
                                <img src="img/top.png" alt>
                                <i class="fa fa-check-circle"></i>
                            </a>
                        </li>
                        <li class="colors"></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
    <script data-cfasync="false"
        src="{{ url('public/assets') }}/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgYKHZB_QKKLWfIRaYPCadza3nhTAbv7c"></script>

    <script src="{{ url('public/assets') }}/js/plugins.min.js"></script>
    <script src="{{ url('public/assets') }}/js/script.min.js"></script>

</body>

<!-- Mirrored from demo.dashboardmarket.com/hexadash-html/ltr/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 02 Jun 2023 14:57:07 GMT -->

</html>
