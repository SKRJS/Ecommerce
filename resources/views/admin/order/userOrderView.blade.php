@extends('fontend.master')
@section('master')
    <div class="container m50 mb50">
        <div class="row">
            <div class="col-md-3 text-center">

                <div class="user-data">

                    <div class="user-data border">

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="logout">logout</button>
                        </form>
                    </div>
                </div>

            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table caption-top  border">
                                <caption>Order View History</caption>
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">product name</th>
                                        <th scope="col">product img</th>
                                        <th scope="col">qty</th>
                                        <th scope="col">price</th>
                                        <th scope="col">sub Total</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orderItem as $key => $item)
                                        <tr>
                                            <td> {{ $key + 1 }} </td>
                                            <td> {{ $item->product->product_name }} </td>
                                            <td> <img src=" {{ asset($item->product->product_img) }}" alt=""
                                                    style="width: 70px; height:70px;"> </td>
                                            <td> {{ $item->qty }} </td>
                                            <td> {{ $item->price }} </td>
                                            <td> {{ $item->price * $item->qty }} </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table caption-top  border">
                                <thead>
                                    <tr>
                                        <th scope="col">total amount</th>
                                        <th scope="col">status</th>
                                        <th scope="col">payment_type</th>
                                        <th scope="col">Action</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($orders as $key => $order)
                                        <tr>
                                            <td> {{ $order->amount }} </td>
                                            <td> {{ $order->status }} </td>
                                            <td> {{ $order->payment_type }} </td>
                                            {{-- <td><a href="" class="button_user">return</a></td> --}}
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>

                    </div>

                    @if ($order->status !== 'delivery')
                    @else
                        <div class="col-md-12">
                            <h5>return area</h5>
                            <textarea name="" id="" cols="40" rows="4"></textarea>
                            <div class="">
                                <a href="" class="button_user">return</a>
                            </div>
                    @endif

                </div>


            </div>

        </div>
    </div>
@endsection
