@extends('fontend.master')
@section('master')
    <div class="container-fluid ">
        <div class="row bg-img trend-position" style="background-image: url('{{ asset('fontend/image/banner/cta.jpg') }}'">
            <div class="col-md-12">
                <div class="data-area-two">
                    <div class="data-twooo">
                        <h1>shop area</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid m50">
        <div class="row">
            <div class="col-md-3 ">
                <div class="side-bar border ">
                    <div class="category ">
                        <div class="dataa ">
                            <div class="cate_date text-center">
                                <h4>all category</h4>
                            </div>
                            @php
                                $category = App\Models\catagory::orderBy('id', 'ASC')->get();
                            @endphp
                            <div class="side-ber">

                                @foreach ($category as $item)
                                    <ul class="siderBer">

                                        <li><a href="{{ url('product/category/' . $item->category_slug) }}">
                                                {{ $item->cate_name }}
                                            </a>
                                            <ul class="subMenu">

                                                @foreach ($item->subcategories as $SubCategory)
                                                    <li><a href="{{ url('product/subCategory/' . $SubCategory->id) }}"><i
                                                                class="fa-solid fa-caret-right"></i>
                                                            {{ $SubCategory->Sub_category }} </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    </ul>
                                @endforeach



                            </div>
                        </div>
                    </div>

                </div>
            </div>


            <div class="col-md-9">
                <div class="container">
                    <div class="row product-area-data">
                        @foreach ($products as $item)
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
                <div class="container">
                    <div class="row">
                        <div class="">
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
