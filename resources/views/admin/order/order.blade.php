@extends('admin.admin_dashboard')
@section('admin')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-xl" style="margin: 3% 3%">
                <div class="card">
                    <h5 class="card-header"> Order Data </h5>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Order Date</th>
                                    <th>Name</th>
                                    <th>Number</th>
                                    <th>Adress</th>
                                    <th>Payment Method</th>
                                    <th>Amount</th>
                                    <th>status</th>
                                    <th>Action</th>


                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ($order as $key => $item)
                                    <tr>
                                        <td> {{ $key + 1 }} </td>
                                        <td>{{ $item->order_date }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->number }}</td>
                                        <td>{{ $item->adress }}</td>
                                        <td>{{ $item->payment_method }}</td>
                                        <td>{{ $item->amount }}.tk</td>
                                        <td>{{ $item->status }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown">
                                                    <i class="ti ti-dots-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{ url('/viewOrder/' . $item->id) }}"><i
                                                            class="ti ti-pencil me-1"></i> Order View</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
