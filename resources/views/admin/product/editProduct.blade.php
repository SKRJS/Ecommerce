@extends('admin.admin_dashboard')
@section('admin')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-xl" style="margin: 3% 20%">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <small class="text-muted float-end">Edit brand all</small>
                    </div>
                    <div class="card-body">



                        <form method="POST" action="{{ route('product.update') }}" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <input type="hidden" name="old_img" value="{{ $product->brand_images }}">

                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">product Name</label>
                                <input type="text" name="product_name" class="form-control" id="basic-default-fullname"
                                    placeholder="" value="{{ $product->product_name }}" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">product stock</label>
                                <input type="text" name="product_qty" class="form-control" id="basic-default-fullname"
                                    placeholder="" value="{{ $product->product_qty }}" />
                            </div>


                            <div class="md-3">
                                <label class="form-label" for="multicol-country">category</label>
                                <select name="category_id" id="multicol-country" class="select2 form-select"
                                    data-allow-clear="true">

                                    <option value="{{ $product->catagory_item->id }}">
                                        {{ $product->catagory_item->cate_name }}
                                    </option>
                                    @foreach ($category as $cate)
                                        <option value=" {{ $cate->id }}"> {{ $cate->cate_name }} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="md-3">
                                <label class="form-label" for="multicol-country">Sub category</label>
                                <select name="sub_id" id="multicol-country" class="select2 form-select"
                                    data-allow-clear="true">
                                    @if ($product->subCate_item)
                                        <option value="{{ $product->subCate_item->id }}">
                                            {{ $product->subCate_item->Sub_category }}
                                        </option>
                                        @foreach ($sub as $sub)
                                            <option value=" {{ $sub->id }}"> {{ $sub->Sub_category }} </option>
                                        @endforeach
                                    @else
                                        <option value="0">
                                            null
                                        </option>
                                        @foreach ($sub as $sub)
                                            <option value=" {{ $sub->id }}"> {{ $sub->Sub_category }} </option>
                                        @endforeach
                                    @endif



                                </select>
                            </div>

                            <div class="md-3">
                                <label class="form-label" for="multicol-country">Area Select</label>
                                <select name="site_id" id="multicol-country" class="select2 form-select"
                                    data-allow-clear="true">
                                    <option value='{{ 0 }}'> Null </option>
                                    <option value='{{ 1 }}'> Best Sellers </option>
                                    <option value='{{ 2 }}'> New Arrival </option>
                                    <option value='{{ 3 }}'> section one </option>
                                    <option value='{{ 4 }}'> section two </option>
                                    <option value='{{ 5 }}'> section three </option>
                                    <option value='{{ 6 }}'> section four </option>
                                    <option value='{{ 7 }}'> pending product </option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">product Price</label>
                                <input type="text" name="product_price" class="form-control" id="basic-default-fullname"
                                    placeholder="" value="{{ $product->product_price }}" />
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="basic-default-upload-file">product pic</label>
                                <input type="file" name="product_img" class="form-control"
                                    id="basic-default-upload-file" />

                                <img src="{{ asset($product->product_img) }}" alt="hello" style="width:100px">
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="basic-default-upload-file">product pic</label>
                                <input type="file" name="product_img2" class="form-control"
                                    id="basic-default-upload-file" />

                                <img src="{{ asset($product->product_img2) }}" alt="hello" style="width:100px">
                            </div>



                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-message">Text area</label>
                                <div class="col-sm-12">
                                    <textarea rows="10" cols="33" name="product_message" id="basic-default-message" class="form-control"
                                        placeholder="" aria-describedby="basic-icon-default-message2">
                                        {{ $product->product_message }}
                                </textarea>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Add</button>
                        </form>
                    </div>

                </div>
            </div>

        </div>
    @endsection
