@extends('fontend.master')
@section('master')
    {{-- <h1>cash out</h1>
    {{ $data['shipping_area'] }} --}}
    <br><br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="total-full-patment">
                        <div class="total-price border m200">

                            @if ($data['shipping_area'] == 'ID')
                                <p>total price : <span class="tkk"> {{ $cartTotal }} </span></p>
                                <p>shipping price : <span class="tkk"> 80 </span></p>
                                <p>sub total price : <span class="tkk"> {{ $cartTotal + 80 }} </span></p>
                            @else
                                <p>total price : <span class="tkk"> {{ $cartTotal }} </span></p>
                                <p>shipping price : <span class="tkk"> 140 </span></p>
                                <p>sub total price : <span class="tkk"> {{ $cartTotal + 140 }} </span></p>
                            @endif
                        </div>


                    </div>
                    <form action="{{ route('cash.order') }}" method="POST">
                        @csrf
                        <div class="total-full-patment">
                            <div class="form-row off">
                                <label for="card-element">
                                    <input type="hidden" name="name" value="{{ $data['shipping_name'] }}">
                                    <input type="hidden" name="email" value="{{ $data['shipping_email'] }}">
                                    <input type="hidden" name="phone" value="{{ $data['shipping_number'] }}">
                                    <input type="hidden" name="area" value="{{ $data['shipping_area'] }}">
                                    <input type="hidden" name="address" value="{{ $data['shipping_adress'] }}">
                                </label>
                            </div>
                            <button class="button4 ml-10">confirm order</button>
                        </div>

                    </form>
                </div>

            </div>

        </div>
    </div>
@endsection
