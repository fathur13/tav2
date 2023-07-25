<!DOCTYPE html>
<html lang="en" dir="ltr">
<!-- Mirrored from demo.dashboardmarket.com/hexadash-html/ltr/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 02 Jun 2023 14:57:50 GMT -->

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>SIMBA - Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="{{ url('public/assets') }}/css/plugin.min.css" />
    <link rel="stylesheet" href="{{ url('public/assets') }}/style.css" />

    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('public/assets') }}/img/logo/logo-transparant.png" />

    <link rel="stylesheet" href="{{ url('public/assets') }}/unicons.iconscout.com/release/v3.0.0/css/line.css" />
</head>

<body>
    <main class="main-content">
        <div class="admin">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-xxl-3 col-xl-4 col-md-6 col-sm-8">
                        <div class="edit-profile">
                            <div class="edit-profile__logos">
                                <a href="">
                                    <img class="dark" src="{{ url('public/assets') }}/img/logo/logo-transparant.png"
                                        height="100rem" style="width: 7rem">
                                    <img class="light" src="{{ url('public/assets') }}/img/logo/logo-transparant.png"
                                        height="100rem" style="width: 7rem" />
                                </a>
                            </div>
                            <div class="card border-0">
                                <div class="card-header">
                                    <div class="edit-profile__title">
                                        <h6>Sign in SIMBA</h6>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="edit-profile__body">
                                        @if ($errors->has('email') || $errors->has('password'))
                                            <div class="alert alert-danger">
                                                <strong>Email atau Password salah.</strong>
                                            </div>
                                        @endif
                                        <form action="{{ route('actionlogin') }}" method="POST">
                                            @csrf
                                            <div class="form-group mb-25">
                                                <label for="username">Username or Email Address</label>
                                                <input type="text" class="form-control" id="username" name="email"
                                                    placeholder="Masukkan Email Anda" required />
                                            </div>
                                            <div class="form-group mb-15">
                                                <label for="password-field">password</label>
                                                <div class="position-relative">
                                                    <input id="password-field" type="password" class="form-control"
                                                        name="password" placeholder="Password" required />
                                                    <div
                                                        class="uil uil-eye-slash text-lighten fs-15 field-icon toggle-password2">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="admin-condition">
                                                <div class="checkbox-theme-default custom-checkbox">
                                                    <input class="checkbox" type="checkbox" id="check-1" />
                                                    <label for="check-1">
                                                        <span class="checkbox-text">Keep me logged in</span>
                                                    </label>
                                                </div>
                                                <a href="forget-password.html">forget password?</a>
                                            </div>
                                            <div
                                                class="admin__button-group button-group d-flex pt-1 justify-content-md-start justify-content-center">
                                                <button type="submit"
                                                    class="btn btn-primary btn-default w-100 btn-squared text-capitalize lh-normal px-50 signIn-createBtn">
                                                    sign in
                                                </button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                                {{-- <div class="px-20">
                                    <p class="social-connector social-connector__admin text-center">
                                        <span>Or</span>
                                    </p>
                                    <div class="button-group d-flex align-items-center justify-content-center">
                                        <ul class="admin-socialBtn">
                                            <li>
                                                <button class="btn text-dark google">
                                                    <img class="svg"
                                                        src="{{ url('public/assets') }}/img/google-Icon.svg"
                                                        alt="img" />
                                                </button>
                                            </li>
                                            <li>
                                                <button class="radius-md wh-48 content-center facebook">
                                                    <i class="uil uil-facebook-f"></i>
                                                </button>
                                            </li>
                                            <li>
                                                <button class="radius-md wh-48 content-center twitter">
                                                    <i class="uil uil-twitter"></i>
                                                </button>
                                            </li>
                                            <li>
                                                <button class="radius-md wh-48 content-center github">
                                                    <i class="uil uil-github"></i>
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </div> --}}
                                {{-- <div class="admin-topbar">
                                    <p class="mb-0">
                                        Don't have an account?
                                        <a href="sign-up.html" class="color-primary"> Sign up </a>
                                    </p>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
    <div class="enable-dark-mode dark-trigger">
        <ul>
            <li>
                <a href="#">
                    <i class="uil uil-moon"></i>
                </a>
            </li>
        </ul>
    </div>

    <script src="{{ url('public/assets') }}/js/plugins.min.js"></script>
    <script src="{{ url('public/assets') }}/js/script.min.js"></script>
</body>

<!-- Mirrored from demo.dashboardmarket.com/hexadash-html/ltr/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 02 Jun 2023 14:57:51 GMT -->

</html>
