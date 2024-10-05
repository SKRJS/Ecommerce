@extends('fontend.master')
@section('master')
    <div class="container-fluid ">
        <div class="row bg-img trend-position" style="background-image: url('{{ asset('fontend/image/banner/cta.jpg') }}'">
            <div class="col-md-12">
                <div class="data-area-two">
                    <div class="data-twooo">
                        <h1>shipping information</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row m500">
            <div class="col-md-9 ">
                <form class="form from-contact-area" method="POST" action=" {{ route('checkout.store') }} ">
                    @csrf
                    <div class="mb-3 focus-data fromData">
                        <label for="exampleInputEmail1" class="form-label">name</label>
                        <input type="text" class="form-control" name="shipping_name" aria-describedby="emailHelp"
                            value="{{ Auth::user()->name }}" required disabled>
                    </div>
                    <div class="mb-3 focus-data">
                        <label for="exampleInputPassword1" class="form-label" name="shipping_email">eamil</label>
                        <input type="email" class="form-control" name="shipping_email" value="{{ Auth::user()->email }}"
                            readonly disabled>
                    </div>
                    <div class="mb-3 focus-data">
                        <label for="exampleInputPassword1" class="form-label">number</label>
                        <input type="tel" class="form-control" name="shipping_number" required>
                    </div>

                    <label for="exampleFormControlTextarea1" class="form-label">select area</label>
                    <select class="form-select option-area" name="shipping_area" aria-label="Default select example"
                        required>
                        <option value="ID">inside of Dhaka</option>
                        <option value="OD">outside of Dhaka</option>
                    </select>

                    <div class="mb-3 focus-data-text  focus-datamt-20">
                        <label for="exampleFormControlTextarea1" class="form-label">Address</label>
                        <textarea class="form-control" name="shipping_adress" id="exampleFormControlTextarea1" rows="" required></textarea>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioDefault2"
                            required checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            cash on delivery
                        </label>
                    </div>

                    <button type="submit" class="btn-success-certt ml-10">submit your order</button>
                </form>
            </div>
            <div class="col-md-3">
                <div class="row">
                    <div class="total-price border  text-center">
                        <p>total price : <span class="taka"> {{ Cart::total() }} TK </span></p>
                    </div>
                </div>
                {{-- <div class="total-price border m200">
                    <p>total price : <span> {{ $cartTotal }} </span></p>
                </div> --}}
            </div>
        </div>
    </div>


    </div>
@endsection
