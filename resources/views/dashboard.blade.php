@extends('fontend.master')
@section('master')
    <!-- user-area  -->
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
    <div class="container m50 mb50">
        <div class="row">
            <div class="col-md-3 text-center">


                <div class="user-data border">
                    <div class="user-data">
                        <div class="user-img">
                            <!--<img src="{{ asset('fontend/image/add/user.webp') }}" alt="" style="width: 70px; height:70px;">-->
                            <h3> user name : {{ Auth::user()->name }}</h3>
                            <h3> user email : {{ Auth::user()->email }}</h3>
                        </div>
                        <!--<a href="{{ route('UserOrder') }}" class="order_link_data">Order Information</a>-->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="logout">logout</button>
                        </form>
                    </div>
                </div>

            </div>
            <div class="col-md-9">
                <div class="table-responsive">
                    <table class="table caption-top  border">
                        <caption>Order History</caption>
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">payment_type</th>
                                <th scope="col">order_number</th>
                                <th scope="col">order_date</th>
                                <th scope="col">amount</th>
                                <th scope="col">status</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $key => $item)
                                <tr>
                                    <th scope="row"> {{ $key + 1 }} </th>
                                    <td> {{ $item->payment_type }} </td>
                                    <td> {{ $item->order_number }} </td>
                                    <td> {{ $item->order_date }} </td>
                                    <td> {{ $item->amount }}tk </td>
                                    <td> {{ $item->status }} </td>
                                    <td><button class="button_user"><a
                                                href="{{ url('/orderUserView/' . $item->id) }}">view</a></button>
                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>




            </div>
        </div>
    </div>
@endsection
