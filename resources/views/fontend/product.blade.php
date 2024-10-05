@extends('fontend.master')
@section('master')
    <!-- user-area  -->

    <div class="container m80">
        <div class="row">
            <div class="col-md-5">
                <div class="product_data border">
                    <div id="carouselExampleAutoplaying" class="carousel slide p0" data-bs-ride="carousel">
                        <div class="carousel-inner">

                            <div class="carousel-item active banner-img2 banner-position data-bs-interval="1000" ">
                                                                        <img src="{{ asset($product->product_img) }}" alt="">
                                                                    </div>
                                                                    <div class="carousel-item  banner-img2 banner-position data-bs-interval="1000" ">
                                                                        <img src="{{ asset($product->product_img2) }}" alt="">
                                                                    </div>

                                                                    {{-- <div class="carousel-item banner-img2 banner-position img-fluid"
                                style="background-image: url('{{ asset($product->product_img2) }}')">

                            </div> --}}
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
                                                    </div>
                                                    <div class="col-md-7 product-data-area border">
                                                        <div class="product-data2">
                                                            <div class="product2">
                                                                <p id="dpname" class="price_data2">
                                                                    {{ $product->product_name }}
                                                                </p>
                                                                <p class="price-data">price : <span class="price-tag">{{ $product->product_price }} BDT</span></p>
                                                                {{-- <p class="price">Category : <span class="price-tag">{{ $product->product_name }}</span></p>
                        <p class="price">in stock : <span class="price-tag">{{ $product->product_qty }}</span></p> --}}
                                                                <div class="wrap">
                                                                    <div class="counter counter-m">
                                                                        <input class="counter__input" id="dqty" type="text" value="1" name="counter"
                                                                            size="5" readonly="readonly" />
                                                                        <a class="counter__increment" href="#">+</a><a class="counter__decrement"
                                                                            href="#">&ndash;</a>
                                                                    </div>
                                                                </div>
                                                                <div class="button-area">
                                                                    <input type="hidden" id="dproduct_id" value="{{ $product->id }}">
                                                                    <button class="add-button button4" onclick="addToCartDetails()">add to
                                                                        cart</button>
                                                                </div>

                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container mb50">
                                                <div class="row">
                                                    <div class="col-md-12 ">
                                                        <div class="Description border">
                                                            <h4>Description</h4>
                                                            <p>
                                                                {{ $product->product_message }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection
