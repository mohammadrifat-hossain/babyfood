@extends('back.layouts.master')
@section('title', 'Landing Page')

@section('head')
<!-- Select2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('master')
    <div class="card shadow text-dark mb-3">
        <div class="card-header">
            <h5 class="d-inline-block"><b>Landing Pages</b></h5>

            <a href="{{route('back.landingBuilderB.create')}}" class="btn btn-sm btn-info float-right"><i class="fas fa-plus"></i> Create New</a>
        </div>

        <div class="card-body">
            <table id="stock_addList" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>SL</th>
                    <th>Title</th>
                    <th>Product Name</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody id="allStockProduct">
                    @foreach ($landings as $landing)
                        <tr>
                            <td>
                                {{$loop->index + 1}}
                            </td>
                            <td>{{$landing->title}}</td>
                            <td>{{$landing->product->title ?? 'n/a'}}</td>
                            <td>
                                <a href="{{route('back.landingBuilderB.edit', $landing->id)}}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                <a href="{{route('back.landingBuilders.delete', $landing->id)}}" onclick="return confirm('Are you sure to remove');" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</a>
                                <a href="{{route('landing.lp', $landing->id)}}" target="_blank" class="btn btn-success btn-sm"><i class="fas fa-eye"></i> View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('footer')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>

    <script>
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
