@extends('admin.admin_dashboard')
@section('admin')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-xl" style="margin: 3% 20%">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <small class="text-muted float-end">Add New Sub Category</small>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('Sub.cate.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="multicol-country">category</label>
                                <select name="category_id" id="multicol-country" class="select2 form-select"
                                    data-allow-clear="true">
                                    @foreach ($category as $cate)
                                        <option value=" {{ $cate->id }}"> {{ $cate->cate_name }} </option>
                                    @endforeach
                                </select>
                                <label class="form-label" for="basic-default-fullname">Sub Category Name</label>
                                <input type="text" name="Sub_name" class="form-control" id="basic-default-fullname"
                                    placeholder="Category Name" />
                            </div>
                            <button type="submit" class="btn btn-primary">Add Sub Category</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    @endsection
