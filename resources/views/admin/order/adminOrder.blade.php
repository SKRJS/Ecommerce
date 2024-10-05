@extends('admin.admin_dashboard')
@section('admin')
    <div class="content-wrapper">

        <div class="row">
            <div class="col-md" style="margin: 3% 2%">
                <div class="card">

                    <h5 class="card-header">Shipping Data</h5>
                    <div class="card mb-4">
                        <ul class="list-group list-group-flush">
                            @foreach ($orders as $item)
                                <li class="list-group-item">name: {{ $item->name }} </li>
                                <li class="list-group-item">number: {{ $item->number }} </li>
                                <li class="list-group-item">adress: {{ $item->adress }} </li>
                                <li class="list-group-item">amount: {{ $item->amount }} </li>
                                <li class="list-group-item">order number: {{ $item->order_number }} </li>
                                <li class="list-group-item">order date: {{ $item->order_date }} </li>
                                <li class="list-group-item">status: <span
                                        style="background-color:rgb(171, 15, 15); color:rgb(255, 255, 255); padding:5px 3px; border-radious:2px; ">
                                        {{ $item->status }}</span></li>
                                <button type="button" class="btn btn-success waves-effect waves-light"
                                    style="margin: 5% 28%"><a href="{{ url('updateStatus/' . $item->id) }}"
                                        style="color: aliceblue;">Confirm
                                        Order</a></button>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md" style="margin: 3% 2%">
                <div class="card">

                    <h5 class="card-header">Order Item Data</h5>
                    <div class="card mb-4">
                        <ul class="list-group list-group-flush">
                            @foreach ($orderItem as $item)
                                <li class="list-group-item">qty: {{ $item->qty }} </li>
                                <li class="list-group-item">price: {{ $item->price }} </li>
                                <li class="list-group-item">total: {{ $item->qty * $item->price }} </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-xl" style="margin: 3% 3%">
                <div class="card">
                    <h5 class="card-header">All item Data</h5>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">product name</th>
                                    <th scope="col">product img</th>
                                    <th scope="col">qty</th>
                                    <th scope="col">price</th>
                                    <th scope="col">sub Total</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
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
        </div>
        {{-- <div class="row">
            <div class="col-xl" style="margin: 0% 5%">
                <div class="card">
                    <h5 class="card-header">All Category Data</h5>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">product name</th>
                                    <th scope="col">product img</th>
                                    <th scope="col">qty</th>
                                    <th scope="col">price</th>
                                    <th scope="col">sub Total</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
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
        </div> --}}
    </div>
@endsection
