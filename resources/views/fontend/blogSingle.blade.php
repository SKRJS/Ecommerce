@extends('fontend.master')
@section('master')
    <div class="container-fluid ">
        <div class="row bg-img trend-position" style="background-image: url('{{ asset('fontend/image/banner/cta.jpg') }}'">
            <div class="col-md-12">
                <div class="data-area-two">
                    <div class="data-twooo">
                        <h1>Bhop area</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 2%">
        <div class="row">
            <div class="about_area border">
                <img class="" src="{{ asset($blog->blog_img) }}" alt="" style="height: 500px">
                <h3>{{ $blog->blog_name }}</h3>
                <p>{!! $blog->blog_text !!}</p>
            </div>

        </div>
    </div>
@endsection
