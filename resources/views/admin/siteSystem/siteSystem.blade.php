@extends('admin.admin_dashboard')
@section('admin')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-xl" style="margin: 3% 20%">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <small class="text-muted float-end">Seo setting</small>

                    </div>
                    <div class="card-body">
                        <form method="" action="" enctype="multipart/form-data">

                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Meta title</label>
                                <input type="text" name="product_name" class="form-control" id="basic-default-fullname"
                                    placeholder="" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Meta Author</label>
                                <input type="text" name="product_name" class="form-control" id="basic-default-fullname"
                                    placeholder="" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Meta Keyword</label>
                                <input type="text" name="product_name" class="form-control" id="basic-default-fullname"
                                    placeholder="" />
                            </div>




                            <label class="col-sm-2 col-form-label" for="basic-default-message">Meta Description</label>
                            <div class="row mb-3">
                                <div class="col-sm-10">
                                    <textarea name="product_message" id="basic-default-message" class="form-control" placeholder=""
                                        aria-describedby="basic-icon-default-message2">
                                    </textarea>
                                </div>
                            </div>

                        </form>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </div>
            </div>

        </div>
    @endsection
