@extends('fontend.master')
@section('master')
    <div class="container-fluid ">
        <div class="row bg-img trend-position" style="background-image: url('{{ asset('fontend/image/banner/cta.jpg') }}'">
            <div class="col-md-12">
                <div class="data-area-two">
                    <div class="data-twooo">
                        <h1>Blog area</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 2%">
        <div class="row">
            @php
                $product = App\Models\blog::orderBy('id', 'ASC')->get();
            @endphp
            @foreach ($product as $item)
                <div class="card" style="width: 18rem; margin-right: 10px">
                    <img class="card-img-top" src="{{ $item->blog_img }}" alt="Card image cap" style="margin-top: 10px">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->blog_name }}</h5>
                        <a href="{{ route('showBlogPage', $item->id) }}" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection
