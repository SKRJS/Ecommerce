@extends('admin.admin_dashboard')
@section('admin')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-xl" style="margin: 3% 20%">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <small class="text-muted float-end">Add New Category</small>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('cate.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Category Name</label>
                                <input type="text" name="cate_name" class="form-control" id="basic-default-fullname"
                                    placeholder="Category Name" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-upload-file">Category Image</label>
                                <input type="file" name="category_img" class="form-control"
                                    id="basic-default-upload-file" required />
                            </div>
                            <button type="submit" class="btn btn-primary">Add Category</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    @endsection
