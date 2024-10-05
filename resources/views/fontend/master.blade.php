<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta Pixel Code -->
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '1045094740951947');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=1045094740951947&ev=PageView&noscript=1" /></noscript>
    <!-- End Meta Pixel Code -->


    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Craftimation</title>
    <link rel="icon" href="{{ asset('fontend/image/banner/LogoCircle.png') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"
        integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"
        integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.css"
        rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">





    <link rel="stylesheet" href="{{ url('fontend/css/style.css?v=') . time() }}" />
    <link rel="stylesheet" href="{{ url('fontend/css/main.css?v=') . time() }}" />
    <link rel="stylesheet" href="{{ url('fontend/css/menu.css?v=') . time() }}" />


</head>

<body>




    {{-- <div id="header_menu">

        <nav class="navbar navbar-expand-lg navbar-light  pc-menu">
            <div class="container">
                <a class="navbar-brand fw-bold" href="{{ route('homePage') }}"><img
                        src="{{ asset('fontend/image/banner/Logo.png') }}" alt="" style="height: 37px"></a>

                <form class="d-flex" role="search" action="{{ route('search') }}" method="GET">
                    @csrf
                    <input class="form-control me-1" type="search" placeholder="Search" name="search"
                        aria-label="Search" value="{{ isset($search) ? $search : '' }}">
                    <button class="searchBtn" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>

                </form>


                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>

                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                        <li class="nav-item ">
                            <a class="nav-link active" aria-current="page" href="{{ route('homePage') }}">Home</a>
                        </li>

                        <li class="nav-item ">
                            <a class="nav-link" href="{{ route('shop') }}">shop</a>
                        </li>

                        <li class="nav-item ">
                            <a class="nav-link" href="{{ route('about') }}">About</a>
                        </li>

                     

                    </ul>
                    <div class="user_logo_two">
                        <a href="{{ route('cartView') }}"><i class="fa-solid fa-cart-arrow-down"></i></a>
                    </div>
                    <a class="icon" href="{{ route('cartView') }}">{{ Cart::count() }}</a>

                    @if (Route::has('login'))

                        @auth
                            <a href="{{ url('/dashboard') }}" class="nav-link login">Dashboard</a>
                        @else
                            <a class="nav-link login" href="{{ route('login') }}">login</a>
                            @if (Route::has('register'))
                                <a class="nav-link login" href="{{ route('register') }}">registration</a>
                            @endif
                        @endauth
                    @endif
                  
                </div>


            </div>
        </nav>
    </div> --}}

    <div class="container-fluid">
        <div class="row">

            <div class="sidebar" id="sideberOneData">
                <div class="sidebar-area">
                    <div class="from-data-cross">
                        <i class="bi bi-x" id="closeButton"></i>
                    </div>
                    <div class="from-data">
                        {{-- <h4>Search Something</h4>
                        <form>
                            <input type="text" name="" id="">
                            <button>Search</button>
                        </form> --}}
                    </div>
                    <ul class="sidebar-nev">
                        <li><a href="{{ route('homePage') }}">home</a></li>
                        <li><a href="{{ route('shop') }}">shop</a></li>
                        <li><a href="{{ route('about') }}">about</a></li>
                        <li><a href="">discount</a></li>
                        <li><a href="">hot sales</a></li>
                    </ul>
                </div>
            </div>

            <div class="header-area">

                <div class="menu-area">
                    <div class="menu-area-data off">
                        <ul>
                            <li><a href="{{ route('homePage') }}">home</a></li>
                            <li><a href="{{ route('shop') }}">shop</a></li>
                            <li><a href="{{ route('about') }}">about</a></li>
                            <li><a href="">discount</a></li>
                            <li><a href="">hot sales</a></li>
                        </ul>
                    </div>

                    <div class="phone">
                        <i class="bi bi-list" id="sideberOne"></i>
                    </div>
                </div>





                <div class="logo-area">
                    <div class="logo-new-pc">
                        <a href="{{ route('homePage') }}"><img src="{{ asset('fontend/image/banner/Logo.png') }}"
                                alt=""></a>

                    </div>
                </div>

                <div class="icon-area">
                    <div class="icon-area-data off">
                        <ul>
                            @if (Route::has('login'))
                                @auth
                                    <li><a href="{{ url('/dashboard') }}"><i class="bi bi-person"></i> Dashboard</a></li>
                                @else
                                    {{-- <a class="nav-link login" href="{{ route('login') }}">login</a> --}}
                                    <li><a href="{{ route('login') }}"><i class="bi bi-person"></i> login</a></li>
                                    {{-- @if (Route::has('register'))
                                        <a class="nav-link login" href="{{ route('register') }}">registration</a>
                                    @endif --}}
                                @endauth
                            @endif


                            <!-- Removed duplicate id on the <i> tag -->
                            <li><a href="#" id="searchIcon"><i class="bi bi-search"></i> Search</a></li>

                            <li><a href="{{ route('cartView') }}">
                                    {{ Cart::total() }} <i class="bi bi-cart"></i> {{ Cart::count() }}
                                </a></li>
                        </ul>
                    </div>
                    <div class="phone-right">
                        <li><a href="{{ route('cartView') }}"> <i class="bi bi-cart"></i> <span
                                    class="price-tagg">{{ Cart::count() }}</span>
                            </a></li>
                    </div>
                </div>

                <div class="search-bar text-center" id="searchBar">
                    <!-- Close Button -->
                    <div class="">
                        <form class="search-area-new" role="search" action="{{ route('search') }}" method="GET">
                            @csrf
                            {{-- <input class="form-control me-1" type="search" placeholder="Search" name="search"
                                aria-label="Search" value="{{ isset($search) ? $search : '' }}">
                            <button class="searchBtn" type="submit"><i
                                    class="fa-solid fa-magnifying-glass"></i></button> --}}

                            <input name="search" type="text"
                                placeholder="Find What You’re Looking for Instantly!" id="searchInput"
                                value="{{ isset($search) ? $search : '' }}">
                            <button id="searchButton" type="submit">Search</button>
                        </form>

                        <i class="bi bi-x" id="closeSearchButton"></i>
                    </div>

                    @php
                        $product_best = App\Models\product::where('site_id', 1)->orderBy('id', 'DESC')->get();
                    @endphp

                    <div class="container">
                        <div class="row  text-center mt-new-100">
                            <h2>Grab the Latest Hot Deals Before They're Gone!</h2>
                        </div>
                        <div class="row product-area-data slider">
                            @foreach ($product_best as $item)
                                <div class="col-md-3 col-6  mb-5">
                                    <div class="product-data-area border">
                                        @if ($item->regular)
                                            <div class="tag-product">
                                                <p>discount product</p>
                                            </div>
                                        @else
                                        @endif

                                        <div class="product-area text-center">
                                            <input type="hidden" id="dproduct_id" value="{{ $item->id }}">
                                            <input type="hidden" id="dqty" value="1">
                                            <div class="product-img">
                                                <a href="{{ route('singleProduct', $item->id) }}"><img
                                                        src="{{ url($item->product_img) }}" alt="" /></a>

                                            </div>
                                            <div class="product-data-single-area text-center pl-50">
                                                <a href="{{ route('singleProduct', $item->id) }}" id="dpname"
                                                    class="product_name">
                                                    {{ $item->product_name }}</a>
                                                <h3>quantity: <span>{{ $item->product_qty }}</span></h3>

                                                @if ($item->regular)
                                                    <h4>price:
                                                        <span
                                                            class="text-decoration-line-through discount-price">{{ $item->product_price }}</span>
                                                        <span class="product-price">{{ $item->regular }}</span>
                                                        BDT
                                                    </h4>
                                                @else
                                                    <h4>price:

                                                        <span class="product-price">{{ $item->product_price }}</span>
                                                        BDT
                                                    </h4>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="button-area text-center">
                                            <button class="addToCart addproduct " type="submit"
                                                data-id="{{ $item->id }}">
                                                add to cart
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>


            </div>
        </div>
    </div>







    {{-- <nav class=" mobile_nav sticky-top">
        <div class="wrapper">

            <div class="logo">
                <a class="navbar-brand fw-bold" href="{{ route('homePage') }}"><img
                        src="{{ asset('fontend/image/banner/mLogo.png') }}" alt="" style="height: 30px">
                </a>
            </div>

            <form class="d-flex" role="search" action="{{ route('search') }}" method="GET">
                @csrf
                <input class="form-control me-1" type="search" placeholder="Search" name="search" aria-label="Search"
                    value="{{ isset($search) ? $search : '' }}">
                <button class="searchBtn" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>


            <div class="cart d-flex">
                <i class="fa-solid fa-cart-arrow-down"><a href="{{ route('cartView') }}">{{ Cart::count() }}</a></i>
            </div>


            <input type="radio" name="slider" id="menu-btn">
            <input type="radio" name="slider" id="close-btn">
            <ul class="nav-links">
                <label for="close-btn" class="btn close-btn"><i class="fas fa-times"></i></label>

                <li class="">
                    <a class="" aria-current="page" href="{{ route('homePage') }}">Home</a>
                </li>

                <li class="">
                    <a class="" href="{{ route('shop') }}">Shop</a>
                </li>

                <li class="">
                    <a class="" href="{{ route('about') }}">About</a>
                </li>



                <li>

                    <input type="checkbox" id="showMega">
                    <label for="showMega" class="mobile-item">Category Menu
                        <span class="category_icon">
                            <i class="fa-solid fa-plus"></i>
                        </span>
                    </label>
                    <div class="mega-box">
                        <div class="content">
                            @php
                                $category = App\Models\catagory::orderBy('id', 'ASC')->get();
                            @endphp
                            <div class="side-ber">

                                @foreach ($category as $item)
                                    <div class="row">
                                        <header>
                                            <a href="{{ url('product/category/' . $item->id) }}">
                                                {{ $item->cate_name }}
                                            </a>
                                        </header>

                                        <ul class="mega-links">

                                            @foreach ($item->subcategories as $SubCategory)
                                                <li>
                                                    <a href="{{ url('product/subCategory/' . $SubCategory->id) }}">{{ $SubCategory->Sub_category }}
                                                    </a>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                </li>



                @if (Route::has('login'))

                    @auth
                        <li> <a href="{{ url('/dashboard') }}" class="">Dashboard</a></li>
                    @else
                        <li> <a class="" href="{{ route('login') }}">Login</a> </li>
                        @if (Route::has('register'))
                            <li> <a class="" href="{{ route('register') }}">Registration</a></li>
                        @endif
                    @endauth
                @endif


                <div class="mobile_logo text-center">
                    <a href="https://www.facebook.com/Craftimationhandcrafts" target="_blank"><i
                            class="fa-brands fa-facebook"></i></a>
                    <a href="https://www.instagram.com/_craftimation_/" target="_blank"><i
                            class="fa-brands fa-instagram"></i></a>
                    <a href="https://www.youtube.com/@craftimation07" target="_blank"><i
                            class="fa-brands fa-youtube"></i></a>
                    <a href="https://www.tiktok.com/@craftimation" target="_blank"><i
                            class="fa-brands fa-tiktok"></i></a>
                </div>
            </ul>


            <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
        </div>
    </nav> --}}



    @yield('master')



    <!-- GIFT-area  -->




    <div class="footer-meuber">
        <div class="footer-area">




            <div class="footer-login text-center">
                <a href="{{ route('homePage') }}"><i class="bi bi-house" id=""> </i></a>
                <h6>home</h6>
            </div>

            <div class="footer-login text-center">
                <a href="{{ route('shop') }}"><i class="bi bi-shop" id=""></i></a>
                <h6 id="">shop</h6>
            </div>


            <div class="footer-login text-center">
                <i class="bi bi-card-list" id="sideberFive"></i>
                <h6 id="">category</h6>
            </div>
            <div class="sidebarFive" id="sideberFiveData">
                <div class="sidebar-area">
                    <div class="from-data-cross">
                        <i class="bi bi-x" id="closeFiveButton"></i>
                    </div>
                    <div class="from-data">
                        <h6>category area</h6>
                        <div class="mobile-side">

                            @php
                                $category = App\Models\catagory::orderBy('id', 'ASC')->get();
                            @endphp


                            @foreach ($category as $item)
                                <h4> <a href="{{ url('product/category/' . $item->category_slug) }}">
                                        {{ $item->cate_name }}
                                    </a></h4>
                                <ul>


                                    @foreach ($item->subcategories as $SubCategory)
                                        <li><i class="bi bi-arrow-right-short"></i> <a
                                                href="{{ url('product/subCategory/' . $SubCategory->id) }}">{{ $SubCategory->Sub_category }}
                                            </a></li>
                                    @endforeach
                                </ul>
                            @endforeach





                        </div>
                    </div>
                </div>
            </div>



            <div class="footer-login text-center">
                <i class="bi bi-search" id="sideberTwo"></i>
                <h6>search</h6>
            </div>

            <div class="sidebartwo" id="sideberTwoData">
                <div class="sidebar-area">
                    <div class="from-data-cross">
                        <i class="bi bi-x" id="closeTwoButton"></i>
                    </div>
                    <div class="from-data">
                        <div class="">
                            <form class="mobile-search" role="search" action="{{ route('search') }}"
                                method="GET">
                                @csrf
                                {{-- <input class="form-control me-1" type="search" placeholder="Search" name="search"
                                    aria-label="Search" value="{{ isset($search) ? $search : '' }}">
                                <button class="searchBtn" type="submit"><i
                                        class="fa-solid fa-magnifying-glass"></i></button> --}}

                                <input name="search" type="text"
                                    placeholder="Find What You’re Looking for Instantly!" id="searchInput"
                                    value="{{ isset($search) ? $search : '' }}">
                                <button id="searchButton" type="submit">Search</button>
                            </form>
                        </div>

                        @php
                            $product_best = App\Models\product::where('site_id', 1)->orderBy('id', 'DESC')->get();
                        @endphp

                        <div class="container">
                            <div class="row  text-center mt-new-100">
                                <h2>Grab the Latest Hot Deals Before They're Gone!</h2>
                            </div>
                            <div class="row product-area-data slider">
                                @foreach ($product_best as $item)
                                    <div class="col-md-3 col-6  mb-5">
                                        <div class="product-data-area border">
                                            @if ($item->regular)
                                                <div class="tag-product">
                                                    <p>discount product</p>
                                                </div>
                                            @else
                                            @endif

                                            <div class="product-area text-center">
                                                <input type="hidden" id="dproduct_id" value="{{ $item->id }}">
                                                <input type="hidden" id="dqty" value="1">
                                                <div class="product-img">
                                                    <a href="{{ route('singleProduct', $item->id) }}"><img
                                                            src="{{ url($item->product_img) }}" alt="" /></a>

                                                </div>
                                                <div class="product-data-single-area text-center pl-50">
                                                    <a href="{{ route('singleProduct', $item->id) }}" id="dpname"
                                                        class="product_name">
                                                        {{ $item->product_name }}</a>
                                                    <h3>quantity: <span>{{ $item->product_qty }}</span></h3>

                                                    @if ($item->regular)
                                                        <h4>price:
                                                            <span
                                                                class="text-decoration-line-through discount-price">{{ $item->product_price }}</span>
                                                            <span class="product-price">{{ $item->regular }}</span>
                                                            BDT
                                                        </h4>
                                                    @else
                                                        <h4>price:

                                                            <span
                                                                class="product-price">{{ $item->product_price }}</span>
                                                            BDT
                                                        </h4>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="button-area text-center">
                                                <button class="addToCart addproduct " type="submit"
                                                    data-id="{{ $item->id }}">
                                                    add to cart
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="footer-login text-center">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}"><i class="bi bi-person" id=""></i></a>
                        <h6>Dashboard</h6>
                    @else
                        <a href="{{ route('login') }}"><i class="bi bi-person" id=""></i></a>
                        <h6>login</h6>
                    @endauth
                @endif
            </div>
            {{-- <div class="sidebarFour" id="sideberFourData">
                <div class="sidebar-area">
                    <div class="from-data-cross">
                        <i class="bi bi-x" id="closeFourButton"></i>
                    </div>
                    <div class="from-data">
                        <h4>Search Something login</h4>
                        <form>
                            <input type="text" name="" id="">
                            <button>Search</button>
                        </form>
                    </div>
                </div>
            </div> --}}












        </div>
    </div>
    <footer class="footer_area ">
        <!-- email-area  -->
        <div class="container-fluid  mb50">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        <div class="data-email-logo">
                            <a class="navbar-brand fw-bold" href="{{ route('homePage') }}"><img
                                    src="{{ asset('fontend/image/banner/footerTwo.png') }}" alt=""
                                    style="height: 50px"></a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="data-email-logo">
                            <h2>connect with us</h2>
                            {{-- <p>
                                Subscribe to learn about our latest products
                            </p> --}}
                            <span>
                                Subscribe to learn about our latest products
                            </span>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="data-email-email">
                            <div class="email-data-area">
                                <input type="text" placeholder="enter your email" />
                                <button type="submit" class="eamil-submit button3">
                                    Subscribe Now
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-10">

                        <div class="social-icons-btn">
                            {{-- <a class="icons twitter" href="#">
                                <ion-icon name="logo-twitter">

                                </ion-icon>
                            </a> --}}
                            <a class="icons facebook" href="https://www.facebook.com/Craftimationhandcrafts">
                                <ion-icon name="logo-facebook " class="icon-data">
                                    <i class="fa-brands fa-facebook-f"></i>
                                </ion-icon>
                            </a>
                            <a class="icons instagram" href="https://www.instagram.com/_craftimation_/">
                                <ion-icon name="logo-instagram" class="icon-data">
                                    <i class="fa-brands fa-instagram"></i>
                                </ion-icon>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- footer-area --}}
        <div class="container-fluid border-top">
            <div class="container mt80">
                <div class="row">
                    <div class="col-md-3 col-6 contact-area">
                        <h4>Contact number</h4>
                        <div class="contact-data">
                            <h3>phone</h4>
                                <p>01942852007</p>

                        </div>
                        <div class="contact-data">
                            <h3>email</h4>
                                {{-- <p>shop@craftimation.com
                                </p> --}}
                                <span>shop@craftimation.com</span>
                        </div>

                    </div>
                    <div class="col-md-3 col-4 contact-area">
                        <h4>My Account</h4>
                        <ul class="footer-url">
                            <li><a href="{{ route('login') }}">login</a></li>
                            <li><a href="{{ route('register') }}">registration</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-4 contact-area">
                        <h4>Socials</h4>
                        <ul class="footer-url">
                            <li><a href="https://www.facebook.com/Craftimationhandcrafts" target="_blank">facebook</a>
                            </li>
                            <li><a href="https://www.instagram.com/_craftimation_/" target="_blank">instagram</a></li>
                            <li><a href="https://www.tiktok.com/@craftimation" target="_blank">tikTok</a></li>
                            <li><a href="https://www.youtube.com/@craftimation07" target="_blank">youTube</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-4 contact-area">
                        <h4>Explore</h4>
                        <ul class="footer-url">
                            <li><a href="{{ route('shop') }}">shop</a></li>
                            {{-- <li><a href="">whole-sale</a></li> --}}
                            <li><a href="{{ route('about') }}">about</a></li>
                            <li><a href="{{ route('return') }}">Return Policy </a></li>
                            <li><a href="{{ route('privacy') }}">Privacy Policy </a></li>

                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </footer>
    {{-- <div class="com">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem, repellat.</p>
    </div> --}}

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
        integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info(" {{ Session::get('message') }} ");
                    break;

                case 'success':
                    toastr.success(" {{ Session::get('message') }} ");
                    break;

                case 'warning':
                    toastr.warning(" {{ Session::get('message') }} ");
                    break;

                case 'error':
                    toastr.error(" {{ Session::get('message') }} ");
                    break;
            }
        @endif
    </script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        $(document).ready(function() {
            // ------------ Counter BEGIN ------------
            $(".counter__increment, .counter__decrement").click(function(e) {
                var $this = $(this);
                var $counter__input = $(this).parent().find(".counter__input");
                var $currentVal = parseInt($(this).parent().find(".counter__input").val());

                //Increment
                if ($currentVal != NaN && $this.hasClass("counter__increment")) {
                    $counter__input.val($currentVal + 1);
                }
                //Decrement
                else if ($currentVal != NaN && $this.hasClass("counter__decrement")) {
                    if ($currentVal >= 1) {
                        $counter__input.val($currentVal - 1);
                    }
                }
            });
            // ------------ Counter END ------------
        });


        /// Start Details Page Add To Cart Product

        function addToCartDetails() {

            var product_name = $('#dpname').text();
            var id = $('#dproduct_id').val();
            var quantity = $('#dqty').val();
            $.ajax({
                type: "POST",
                dataType: 'json',
                data: {
                    quantity: quantity,
                    product_name: product_name,
                },
                url: "/dcart/data/store/" + id,
                success: function(data) {
                    location.reload();
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'bottom-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 2000
                    })
                    if ($.isEmptyObject(data.error)) {

                        Toast.fire({
                            type: 'success',
                            title: data.success,
                        })

                    } else {

                        Toast.fire({
                            type: 'error',
                            title: data.error,
                        })
                    }

                    // End Message
                }
            })



        }

        $(document).ready(function() {
            $('.addproduct').on('click', function() {
                var id = $(this).data('id');
                if (id) {
                    $.ajax({
                        url: "/add/to/cart/" + id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            location.reload();
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'bottom-end',
                                showConfirmButton: false,
                                icon: 'success',
                                timer: 5000
                            })
                            if ($.isEmptyObject(data.error)) {
                                Toast.fire({
                                    type: 'success',
                                    title: data.success
                                })
                            } else {
                                Toast.fire({
                                    type: 'error',
                                    title: data.error
                                })
                            }

                        },

                    });
                } else {
                    alert('danger');
                }

            });
        });
    </script>



    <script type="text/javascript">
        function cart() {
            $.ajax({
                type: 'GET',
                url: '/get-cart-product',
                dataType: 'json',
                success: function(response) {

                    var rows = ""
                    $.each(response.carts, function(key, value) {
                        rows += `
                        
                        <tr>
                            <td class="image product-thumbnail pt-40"><img src="${value.options.image} " alt="#"></td>
                            <td class="td" >${value.name} </td>
                            <td class="td" >${value.price}tk</td>
                            <td class="tdc">
                               <div class="flex-count">
                                 <div class="counter tdc">
                                    <input class="counter__input" id="dqty" type="text" value="${value.qty}" name="counter" size="5" readonly="readonly" />
                                    <a class="counter__increment" type="submit" id="${value.rowId}" onclick="cartIncrement(this.id)">+</a>

                                    <a class="counter__decrement" type="submit" id="${value.rowId}" onclick="cartDecrement(this.id)">&ndash;</a>
                                </div>
                                </div>
                            </td>
                            <td class="td" >${value.subtotal}tk</td>
                            <td><a type="submit" id="${value.rowId}" onclick="cartRemove(this.id)" class="remove"> remove </a></td>
                        </tr> 

                        
                        
                        `
                    });

                    $('#cartPage').html(rows);
                }
            })
        }
        cart();

        function cartRemove(id) {
            $.ajax({
                type: "GET",
                dataType: 'json',
                url: "/cart-remove/" + id,
                success: function(data) {
                    cart();
                    location.reload();
                    // Start Message 
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'bottom-end',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {

                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success,
                        })
                    } else {

                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error,
                        })
                    }
                    // End Message  
                }
            })
        }

        function cartDecrement(id) {
            $.ajax({
                type: 'GET',
                url: "/cart-decrement/" + id,
                dataType: 'json',
                success: function(data) {
                    cart();
                    location.reload();
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'bottom-end',

                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {

                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success,
                        })
                    } else {

                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error,
                        })
                    }

                }
            });
        }

        function cartIncrement(id) {
            $.ajax({
                type: 'GET',
                url: "/cart-increment/" + id,
                dataType: 'json',
                success: function(data) {
                    cart();
                    location.reload();
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'bottom-end',

                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {

                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success,
                        })
                    } else {

                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error,
                        })
                    }

                }
            });
        }
    </script>

    {{-- slider-one  --}}
    <script type="text/javascript">
        $('.slider').slick({
            dots: true,
            infinite: true,
            speed: 1500,
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 500,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });
    </script>
    {{-- slider-two  --}}
    <script type="text/javascript">
        $('.sliderTwo').slick({
            dots: true,
            infinite: true,
            speed: 1500,
            slidesToShow: 6,
            slidesToScroll: 6,
            autoplay: false,
            autoplaySpeed: 500,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });
    </script>


    {{-- menu-area  --}}

    <script>
        const sidebar = document.getElementById('sideberOneData');
        const closeButton = document.getElementById('closeButton');

        // Open sidebar when the button is clicked
        document.getElementById('sideberOne').addEventListener('click', () => {
            sidebar.classList.add('open'); // Just add 'open' class
        });

        // Close sidebar when the close button (X) is clicked
        closeButton.addEventListener('click', () => {
            sidebar.classList.remove('open'); // Just remove 'open' class
        });
    </script>


    <script>
        const sidebartwo = document.getElementById('sideberTwoData');
        const closeButtontwo = document.getElementById('closeTwoButton');

        // Open sidebar when the button is clicked
        document.getElementById('sideberTwo').addEventListener('click', () => {
            sidebartwo.classList.add('open');

        });

        // Close sidebar when the close button (X) is clicked
        closeButtontwo.addEventListener('click', () => {
            sidebartwo.classList.remove('open'); // Just remove 'open' class

        });
    </script>


    <script>
        const sidebarfive = document.getElementById('sideberFiveData');
        const closeButtonfive = document.getElementById('closeFiveButton');

        // Open sidebar when the button is clicked
        document.getElementById('sideberFive').addEventListener('click', () => {
            sidebarfive.classList.add('open');

        });

        // Close sidebar when the close button (X) is clicked
        closeButtonfive.addEventListener('click', () => {
            sidebarfive.classList.remove('open'); // Just remove 'open' class

        });
    </script>


    <script>
        //     const sidebarfour = document.getElementById('sideberFourData');
        //     const closeButtonfour = document.getElementById('closeFourButton');

        //     // Open sidebar when the button is clicked
        //     document.getElementById('sideberFour').addEventListener('click', () => {
        //         sidebarfour.classList.add('open');
        //         console.log('hello login')
        //     });

        //     // Close sidebar when the close button (X) is clicked
        //     closeButtonfour.addEventListener('click', () => {
        //         sidebarfour.classList.remove('open'); // Just remove 'open' class
        //         console.log('hello')
        //     });
        // 
    </script>

    <script>
        // Get references to the search icon and search bar
        const searchIcon = document.getElementById('searchIcon');
        const searchBar = document.getElementById('searchBar');
        const searchButtonClose = document.getElementById('closeSearchButton');

        // Toggle the search bar visibility when the search icon is clicked
        searchIcon.addEventListener('click', (event) => {
            event.preventDefault(); // Prevent page reload on click
            console.log('hello')
            searchBar.classList.add('show'); // Toggle the 'show' class to slide down/up
        });

        searchButtonClose.addEventListener('click', () => {
            searchBar.classList.remove('show');
        })
    </script>


    <script>
        function onSuccess(googleUser) {
            console.log('Logged in as: ' + googleUser.getBasicProfile().getName());
        }

        function onFailure(error) {
            console.log(error);
        }

        function renderButton() {
            gapi.signin2.render('my-signin2', {
                'scope': 'profile email',
                'width': 240,
                'height': 50,
                'longtitle': true,
                'theme': 'dark',
                'onsuccess': onSuccess,
                'onfailure': onFailure
            });
        }
    </script>

    <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>

</body>


</body>

</html>
{{-- // <td scope="row"><img src="${value.options.image} alt="#"</td> --}}
