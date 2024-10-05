@extends('admin.admin_dashboard')
@section('admin')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-xl" style="margin: 3% 20%">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <small class="text-muted float-end">Edit category </small>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('cate.update') }}" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $category->id }}">

                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">category Name</label>
                                <input type="text" name="cate_name" class="form-control" id="basic-default-fullname"
                                    required value="{{ $category->cate_name }}" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-upload-file">product pic</label>
                                <input type="file" name="category_img" class="form-control"
                                    id="basic-default-upload-file" required />
                            </div>

                            <button type="submit" class="btn btn-primary" data-bs-dismiss="toast" aria-label="Close">Update
                                category</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    @endsection
