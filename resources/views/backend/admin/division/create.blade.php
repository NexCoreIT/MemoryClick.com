@extends('backend.layout.app')
@section('package_menu', 'show')
@section('packages', 'show active')
@section('content')
    <div class="container">

        <div class="col-12 d-flex justify-content-center mt-4">
            <div class="card shadow-lg" style="max-width: 600px; width: 100%;">
                <div class="card-header">
                    <h3 class="card-title mb-0">Add New Division</h3>
                </div>
                <form action="http://localhost/bridal/public/admin/package-category/save" method="POST"
                    enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="IG9Gzeharr1jECWp02Gu8kZ8r2Ao4VT0X8JrBxtO" autocomplete="off">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Division Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Type Name"
                                required="">
                            <small>

                            </small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-control form-select">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>

                    </div>
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection

@push('scripts')
@endpush
