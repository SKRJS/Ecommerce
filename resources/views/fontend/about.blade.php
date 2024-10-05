@extends('fontend.master')
@section('master')
    <div class="container-fluid ">
        <div class="row bg-img trend-position" style="background-image: url('{{ asset('fontend/image/banner/cta.jpg') }}'">
            <div class="col-md-12">
                <div class="data-area-two">
                    <div class="data-twooo">
                        <h1>About us</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">

            <div class="col-md-6">
                <div class="about_area border">
                    <h3>COVER</h3>
                    <p>Craftimation since it’s inception has produced uniquely handcrafted items, to revolutionize the
                        perspective
                        of handcrafts. We have a wide range of handcrafts like 3d handcrafted mugs, handcrafted miniatures,
                        paintings, jute lamp shades, wire sculptures, hand painted pottery and more.
                        Craftimation stepped into the world of handcrafts with 3d Handcrafted Mugs. The concept aimed to
                        breathe
                        life into designs by presenting them in a dynamic 3D format, create a difference from the generic
                        printed
                        mugs which has been in the market for decades.</p>
                </div>
            </div>
            <div class="col-md-6"></div>



        </div>
        <div class="row">

            <div class="col-md-6"></div>
            <div class="col-md-6">
                <div class="about_area border">
                    <h3>Community Activity</h3>
                    <p>The very start of Craftimation on its professional journey was intended to always help the livings in
                        need.
                        From The Stray Cats and Dogs to people in need, we actively try to do our best as an organization.
                        From
                        providing groceries to those facing hardship, to offering food and treatments for the stray animals
                        on
                        the
                        streets, Craftimation strives to create smiles and bring happiness to its community.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="about_area border">

                    <h3>MISSION</h3>
                    <p>To be an established brand for handcrafts and art throughout Bangladesh. We aspire to be a brand
                        people
                        choose first, for all our artisanal and unique handicrafts.</p>
                </div>
            </div>

            <div class="col-md-6"></div>

        </div>
        <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-6">
                <div class="about_area border">

                    <h3>VISION</h3>
                    <p>To expand across borders and get recognition for our handcrafted products as the best Bangladeshi
                        brand.
                    </p>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        $(document).ready(function() {
            if (window.location.pathname === '/about') {
                fbq('track', 'ViewContent', {
                    content_name: 'About Page',
                    content_category: 'About'
                });
            }
        });
    </script>
@endsection
