@extends('back.layouts.master')
@section('title', 'Landing Page Create')

@section('head')
<!-- Select2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('master')
    <div class="card shadow text-dark mb-3">
        <div class="card-header">
            <h5 class="d-inline-block"><b>Landing Pages Create</b></h5>

            <a href="{{route('back.landingBuilderB.index')}}" class="btn btn-sm btn-info float-right"><i class="fas fa-angle-left"></i> Back</a>
        </div>

        <form action="{{route('back.landingBuilderB.store')}}" method="POST">
            @csrf

            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label><b>Page Title</b>*</label>
                            <input type="text" name="title" class="form-control" value="{{old('title')}}" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label><b>Mobile Number</b>*</label>
                            <input type="text" name="mobile_number" class="form-control" value="{{old('mobile_number')}}" required>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label><b>Head Code</b></label>
                            <textarea name="head_code" class="form-control" cols="30" rows="10"></textarea>
                        </div>

                        <div class="form-group">
                            <label><b>Body Code</b></label>
                            <textarea name="body_code" class="form-control" cols="30" rows="10"></textarea>
                        </div>

                        <div class="form-group">
                            <label><b>Footer Code</b></label>
                            <textarea name="footer_code" class="form-control" cols="30" rows="10"></textarea>
                        </div>

                        <div class="form-group">
                            <label><b>Server Site Track</b></label>
                            <select name="server_site_track" class="form-control">
                                <option value="No" checked>No</option>
                                <option value="Yes">Yes</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label><b>Pixel ID</b></label>

                            <input name="pixel_id" class="form-control">
                        </div>
                        <div class="form-group">
                            <label><b>Pixel Access Token</b></label>

                            <input name="pixel_access_token" class="form-control">
                        </div>

                        <div class="form-group">
                            <label><b>Description</b></label>

                            <textarea id="editor" class="form-control" name="description" cols="30" rows="3">{{old('description')}}</textarea>
                        </div>

                        <div class="form-group">
                            <label><b>Video Embed Code</b></label>

                            <textarea class="form-control" name="vide_embed_code" cols="30" rows="3">{{old('vide_embed_code')}}</textarea>
                        </div>
                    </div>
                </div>

                <div class="form-group position-relative">
                    <label><b>Search Product</b></label>
                    <select class="form-control form-control-sm selectpicker_products" name="product"></select>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-info">Store</button>
            </div>
        </form>
    </div>
@endsection

@section('footer')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>

    <!-- CK Editor -->
    <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>

    <script>
        // CKEditor
        $(function () {
            CKEDITOR.replace('editor', {
                height: 400,
                filebrowserUploadUrl: "{{route('imageUpload')}}?",
                extraAllowedContent: 'iframe[*]',
                allowedContent: true
            });
        });

        $('.selectpicker_products').select2({
            placeholder: "Search Product",
            minimumInputLength: 1,
            ajax: {
                url: '{{ route("back.products.selectList") }}',
                dataType: 'json',
                method: 'POST',
                data: function (params) {
                    return {
                        q: $.trim(params.term)
                    };
                },
                processResults: function (data) {
                    return {
                        results: data
                    };
                },
                cache: true
            }
        });

        // Add Product to Stick
        $(document).on('change', '.selectpicker_products', function () {
            let id = $(this).val();

            $('.loader').show();
            // Ajax Data
            $.ajax({
                url: '{{route("back.landingBuilders.addProduct")}}',
                method: 'GET',
                data: {id, _token: '{{csrf_token()}}'},
                success: function (result) {
                    $('.loader').hide();
                    $('#allStockProduct').append(result);
                }
            });
        });

        // Delete Product
        $(document).on('click', '.removeProduct', function () {
            if (confirm("Are you sure to delete?")) {
                $(this).closest('tr').remove();
            }
        });
    </script>
@endsection
