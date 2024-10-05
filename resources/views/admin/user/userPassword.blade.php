@extends('admin.admin_dashboard')
@section('admin')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-xl" style="margin: 3% 20%">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <small class="text-muted float-end">User Password Reset</small>
                    </div>
                    <div class="card-body">
                        @php
                            // $id = Auth::user()->id;
                        @endphp
                        <form method="POST" action="{{ route('updatePassword') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="input-group input-group-merge has-validation">
                                <input type="password" id="password" class="form-control" name="password"
                                    placeholder="············" aria-describedby="password">
                                <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary" data-bs-dismiss="toast" aria-label="Close">
                                Reset password
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    @endsection
