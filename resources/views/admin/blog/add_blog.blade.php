@extends('admin.admin_dashboard')
@section('admin')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-xl" style="margin: 3% 20%">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <small class="text-muted float-end">Add New Blog</small>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('store.blog') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Blog Title</label>
                                <input type="text" name="blog_title" class="form-control" id="basic-default-fullname"
                                    required />
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Blog Text Area</label>
                                <textarea id="summernote" cols="" rows="" name="blog_text"></textarea>

                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="basic-default-upload-file">Blog Image</label>
                                <input type="file" name="blog_img" class="form-control" id="basic-default-upload-file"
                                    required />
                            </div>
                            <button type="submit" class="btn btn-primary" data-bs-dismiss="toast" aria-label="Close">Add
                                Blog</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>


        <script>
            $('#summernote').summernote({
                placeholder: 'text area',
                tabsize: 2,
                height: 300,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['picture']],

                ]
            });
        </script>
    @endsection
