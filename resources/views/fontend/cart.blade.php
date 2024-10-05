@extends('fontend.master')
@section('master')
    <div class="container-fluid ">
        <div class="row bg-img trend-position" style="background-image: url('{{ asset('fontend/image/banner/cta.jpg') }}'">
            <div class="col-md-12">
                <div class="data-area-two">
                    <div class="data-twooo">
                        <h1>this is your cart</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">


        @if (Cart::total() > 0)
            <div class="row">

            </div>
            <div class="row mt50">
                <div class="col-md-12 table-responsive">
                    <table class="table border ">
                        <thead>
                            <tr class="table-data">
                                <th scope="col">product image</th>
                                <th scope="col">product name</th>
                                <th scope="col">Unite Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Subtotal</th>
                                <th scope="col">Remove Item</th>
                            </tr>
                        </thead>

                        <tbody id="cartPage">


                        </tbody>

                    </table>
                </div>



            </div>
            <div class="row ">
                <div class="col-md-8"></div>
                <div class="col-md-4">
                    <div class="total-price border  text-center">
                        <p>total price : <span class="taka"> {{ Cart::total() }} TK </span></p>
                        <a href="{{ route('checkout') }}" class="btn btn-success-cert"
                            style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">Checkout</a>
                    </div>
                </div>
            </div>
        @else
            <div class="row">
                <div class="container">
                    <div class="cart-data-area">
                        <div class="cart-user-data">
                            <i class="fa-solid fa-cart-shopping"></i>
                            <h2>Your cart is currently empty.</h2>
                            <a href="{{ route('shop') }}"> SHOP NOW </a>
                        </div>
                    </div>
                </div>
            </div>
        @endif



    </div>
@endsection
