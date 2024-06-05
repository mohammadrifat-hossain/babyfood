@extends('back.layouts.master')
@section('title', 'Create Customer')

@section('master')
<form action="{{route('back.customers.store')}}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col-md-8">
            <div class="card border-light mt-3 shadow">
                <div class="card-header no_icon">
                    <a href="{{route('back.customers.index')}}" class="btn btn-success btn-sm"><i class="fas fa-angle-double-left"></i> View All</a>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><b>Name*</b></label>
                                <input type="text" class="form-control form-control-sm" name="name" value="{{old('name')}}" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><b>Email*</b></label>
                                <input type="email" class="form-control form-control-sm" name="email" value="{{old('email')}}" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><b>Mobile Number*</b></label>
                                <input type="number" class="form-control form-control-sm" name="mobile_number" value="{{old('mobile_number')}}" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label><b>Address*</b></label>
                                <input type="text" class="form-control form-control-sm" name="address" value="{{old('address')}}" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-light mt-3 shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-center">
                                <div class="img_group">
                                    <img class="img-thumbnail uploaded_img" src="{{asset('img/default-img.png')}}">

                                    <div class="form-group text-center">
                                        <label><b>Profile Picture</b></label>
                                        <div class="custom-file text-left">
                                            <input type="file" class="custom-file-input image_upload" name="profile" accept="image/*">
                                            <label class="custom-file-label">Choose file...</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label><b>Password*</b></label>
                                <input type="password" class="form-control form-control-sm" name="password" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><b>Confirm Password*</b></label>
                                <input type="password" class="form-control form-control-sm" name="password_confirmation" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button class="btn btn-success btn-block">Create</button>
                    <small><b>NB: *</b> marked are required field.</small>
                </div>
            </div>
        </div>
    </div>
</form>

{{-- <div class="card border-light mt-3 shadow">
    <div class="card-header">
        <h5 class="d-inline-block">Create Customer</h5>

        <a href="{{route('back.customers.index')}}" class="btn btn-success btn-sm float-right"><i class="fas fa-list"></i> Customer list</a>
    </div>
    <form action="{{route('back.customers.store')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label><b>Name*</b></label>
                        <input type="text" class="form-control" name="name" value="{{old('name')}}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label><b>Email*</b></label>
                        <input type="email" class="form-control" name="email" value="{{old('email')}}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label><b>Mobile Number*</b></label>
                        <input type="number" class="form-control" name="mobile_number" value="{{old('mobile_number')}}" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label><b>Street*</b></label>
                        <input type="text" class="form-control" name="street" value="{{old('street')}}" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label><b>Zip*</b></label>
                        <input type="text" class="form-control" name="zip" value="{{old('zip')}}" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label><b>City*</b></label>
                        <input type="text" class="form-control" name="city" value="{{old('city')}}" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label><b>State*</b></label>
                        <input type="text" class="form-control" name="state" value="{{old('state')}}" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label><b>Country*</b></label>
                        <input type="text" class="form-control" name="country" value="{{old('country')}}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label><b>Profile Picture</b></label>
                        <input type="file" class="form-control" name="profile" accept="image/*">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label><b>Password*</b></label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label><b>Confirm Password*</b></label>
                        <input type="password" class="form-control" name="password_confirmation" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-success">Submit</button>
            <br>
            <small><b>NB: *</b> marked are required field.</small>
        </div>
    </form>
</div> --}}
@endsection
