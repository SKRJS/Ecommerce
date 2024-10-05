@extends('fontend.master')
@section('master')
    <style>
        .bg-cover {
            /* background-image: url("{{ asset('fontend/image/banner/Charity.png') }}"); */
            background-image: url("{{ asset('fontend/image/banner/Charity3.png') }}");
            background-repeat: no-repeat;
            background-size: 100% 100%;
            position: relative;
        }

        @media only screen and (max-width: 768px) {
            .bg-cover {

                background-size: 100% 100%;


            }

            .charity-data {
                padding: 38px 0px !important;
                text-align: center;
            }


        }

        .charity-data {
            padding: 140px 0px;
            text-align: center;
        }
    </style>

    <div class="container-fluid">
        <div class="row">

            <div id="carouselExampleAutoplaying" class="carousel slide p0" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active banner-img banner-position"
                        style="background-image: url('{{ asset('fontend/image/banner/3.jpg') }}')">
                        <div class="banner_data">
                            <div class="banner_data_area text-center" href="{{ route('shop') }}">
                                <p>
                                    Crafted with Love,
                                    <br />
                                    Drafted with Dreams.
                                </p>
                                <a href="{{ route('shop') }}"><button class="button"
                                        style = "color:white; font-wight:bold">Shop Now</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>


    {{-- banner-area  --}}

    <div class="container mt-50 off">
        <div class="row">
            <div class="">
                <div class="img-fluid">
                    <a href="{{ route('shop') }}"><img src="{{ asset('fontend/image/banner/banner.jpg') }}" alt=""
                            style="width: 100%"></a>
                </div>
            </div>

        </div>
    </div>


    {{-- section-area  --}}

    <div class="container mt-50 off-area">
        <div class="row">
            <div class="col-md-6">
                <div class="data-area img-fluid">
                    <a href="{{ route('shop') }}"><img src="{{ asset('fontend/image/banner/1.jpg') }}" alt=""
                            style="width: 100%"></a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="row">
                    <div class="col-md-12 mb-30">
                        <div class="data-area2 img-fluid">
                            <a href="{{ route('shop') }}"><img src="{{ asset('fontend/image/banner/2.png') }}"
                                    alt="" style="width: 100%"></a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="data-area2 img-fluid">
                            <a href="{{ route('shop') }}"><img src="{{ asset('fontend/image/banner/3.png') }}"
                                    alt="" style="width: 100%"></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="col-md-12">
                    <div class="data-area img-fluid">
                        <a href="{{ route('shop') }}"><img src="{{ asset('fontend/image/banner/4.png') }}" alt=""
                                style="width: 100%"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="container mt-50 off-pc">
        <div class="row">
            <div class="col-md-6 col-6  mb-40">
                <div class="data-area img-fluid">
                    <a href="{{ route('shop') }}"><img src="{{ asset('fontend/image/banner/1.jpg') }}" alt=""
                            style="width: 100%"></a>
                </div>
            </div>
            <div class="col-md-6 col-6 mb-40">
                <div class="data-area img-fluid">
                    <a href="{{ route('shop') }}"><img src="{{ asset('fontend/image/banner/2.png') }}" alt=""
                            style="width: 100%"></a>
                </div>
            </div>
            <div class="col-md-6 col-6 mb-40">
                <div class="data-area img-fluid">
                    <a href="{{ route('shop') }}"><img src="{{ asset('fontend/image/banner/3.png') }}" alt=""
                            style="width: 100%"></a>
                </div>
            </div>

            <div class="col-md-6 col-6 mb-40">
                <div class="data-area img-fluid">
                    <a href="{{ route('shop') }}"><img src="{{ asset('fontend/image/banner/4.png') }}" alt=""
                            style="width: 100%"></a>
                </div>
            </div>

        </div>
    </div>


    @php
        $product_best = App\Models\product::where('site_id', 1)->orderBy('id', 'DESC')->get();
    @endphp

    <div class="container">
        <div class="row  mt-50 area-title">
            <h2>Best Selling Products</h2>
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
                                <a href="{{ route('singleProduct', $item->id) }}" id="dpname" class="product_name">
                                    {{ $item->product_name }}</a>
                                <h3>quantity: <span>{{ $item->product_qty }}</span></h3>

                                @if ($item->regular)
                                    <h4>price:
                                        <span
                                            class="text-decoration-line-through discount-price">{{ $item->product_price }}</span>
                                        <span class="product-price">{{ $item->regular }}</span> BDT
                                    </h4>
                                @else
                                    <h4>price:

                                        <span class="product-price">{{ $item->product_price }}</span> BDT
                                    </h4>
                                @endif
                            </div>
                        </div>
                        <div class="button-area text-center">
                            <button class="addToCart addproduct " type="submit" data-id="{{ $item->id }}">
                                add to cart
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


    <div class="container mt-50">
        <div class="row">
            <div class="charity bg-cover trend-position">
                <div class="charity-data">
                    <h1>5% goes to charity</h1>
                    <a href=""><button class="button" style = "color:white; font-wight:bold">Check
                            Now</button></a>
                </div>
            </div>
        </div>
    </div>




    @php
        $product_new = App\Models\product::where('site_id', 2)->orderBy('id', 'DESC')->get();
    @endphp

    <!-- Best Sellers  -->
    <div class="container">
        <div class="row  mt-50 area-title">
            <h2>New Arrival Products</h2>
        </div>
        <div class="row product-area-data slider ">
            @foreach ($product_new as $item)
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
                                <a href="{{ route('singleProduct', $item->id) }}" id="dpname" class="product_name">
                                    {{ $item->product_name }}</a>
                                <h3>quantity: <span>{{ $item->product_qty }}</span></h3>

                                @if ($item->regular)
                                    <h4>price:
                                        <span
                                            class="text-decoration-line-through discount-price">{{ $item->product_price }}</span>
                                        <span class="product-price">{{ $item->regular }}</span> BDT
                                    </h4>
                                @else
                                    <h4>price:

                                        <span class="product-price">{{ $item->product_price }}</span> BDT
                                    </h4>
                                @endif
                            </div>
                        </div>
                        <div class="button-area text-center">
                            <button class="addToCart addproduct " type="submit" data-id="{{ $item->id }}">
                                add to cart
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


    </div>

    <!-- GIFT-area  -->

    @php
        $catagory = App\Models\catagory::orderBy('id', 'ASC')->get();
    @endphp

    <!-- best-category-area  -->
    <div class="container ">
        <div class="row  area-title mb-10">
            <h2>Categories</h2>
        </div>
        <div class="row sliderTwo ">
            @foreach ($catagory as $item)
                <div class="col-md-3  mb-5">
                    <div class="data-cate m-1">
                        <a href="{{ url('product/category/' . $item->category_slug) }}">
                            <img src="{{ asset($item->category_img) }}" alt="">
                        </a>
                        <div class="itam">
                            <h3>
                                <a
                                    href="{{ url('product/category/' . $item->category_slug) }}">{{ $item->cate_name }}</a>
                            </h3>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
