<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('public/fontend/login/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('fontend/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('fontend/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/fontend/login/vendor/animate/animate.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('public/fontend/login/vendor/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('public/fontend/login/vendor/animsition/css/animsition.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/fontend/login/vendor/select2/select2.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('fontend/login/vendor/daterangepicker/daterangepicker.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/fontend/login/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/fontend/login/css/main.css') }}">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-b-160 p-t-50">
                <form class="login100-form validate-form" id="formAuthentication" class="mb-3" method="POST"
                    action="{{ route('login') }}">
                    @csrf
                    <span class="login100-form-title
                    p-b-43">
                        Admin Account Login
                    </span>

                    <div class="wrap-input100 rs1 validate-input" data-validate="Username is required">
                        <input class="input100" id="email" autocomplete="username" class="block mt-1 w-full"
                            type="email" name="email">
                        <span class="label-input100">Username</span>
                    </div>


                    <div class="wrap-input100 rs2 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" id="password" class="form-control" name="password">
                        <span class="label-input100">Password</span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Sign in
                        </button>
                    </div>

                    {{-- <div class="text-center w-full p-t-23">
                        <a href="#" class="txt1">
                            Forgot password?
                        </a>
                    </div> --}}
                </form>
            </div>
        </div>
    </div>





    <!--===============================================================================================-->
    <script
        src="{{ asset('fontend/login/vendor/jquery/jquery-3.2.1.min.js"></script') }}>
    <!--===============================================================================================-->
    <script src="{{ asset('fontend/login/vendor/animsition/js/animsition.min.js"></script') }}>
        <!--===============================================================================================
        -->
    <script
        src="{{ asset('fontend/login/vendor/bootstrap/js/popper.js"></script') }}>
    <script src="{{ asset('fontend/login/vendor/bootstrap/js/bootstrap.min.js"></script') }}>
        <!--===============================================================================================
        -->
    <script
        src="{{ asset('fontend/login/vendor/select2/select2.min.js"></script') }}>
    <!--===============================================================================================-->
    <script src="{{ asset('fontend/login/vendor/daterangepicker/moment.min.js"></script') }}>
        <
        script src="{{ asset('fontend/login/vendor/daterangepicker/daterangepicker.js"></script') }}>
    <!--===============================================================================================-->
    <script src="{{ asset('fontend/login/vendor/countdowntime/countdowntime.js"></script') }}
            >
            <
            !-- === === === === === === === === === === === === === === === === === === === === === === === === === ===
            ===
            ===
            ===
            ===
            ===
            ==
            -- >
            <
            script src = "{{ asset('fontend/login/js/main.js"></script') }}>

            <
            /body>

            <
            /html>
