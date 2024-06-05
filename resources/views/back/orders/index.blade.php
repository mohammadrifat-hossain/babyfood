
@php
    $ref = request('ref') ?? 'All';
@endphp

@extends('back.layouts.master')
@section('title', "$ref Orders")

@section('head')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.23/datatables.min.css"/>
@endsection

@section('master')
<div class="card border-light mt-3 shadow">
    <div class="card-header">
        <h5 class="d-inline-block">Order list</h5>

        <a href="{{route('back.orders.exportCsv')}}" class="btn btn-success btn-sm float-right"><i class="fas fa-download"></i> Export CSV</a>
    </div>
    <form action="{{route('back.orders.printList')}}" method="POST">
        @csrf

        <div class="card-body table-responsive">
            <table class="table table-bordered table-sm" id="dataTable">
                <thead>
                  <tr>
                    <th scope="col">
                        <input class="mt-1 all_checkbox float-left mr-2" id="mark_all" type="checkbox" value="Yes" style="width: 20px;height:20px">
                        <label for="mark_all">Select</label>
                    </th>
                    <th scope="col">#</th>
                    <th scope="col">Date</th>
                    <th scope="col">Shipping Name</th>
                    <th scope="col">Shipping Address</th>
                    <th scope="col">Shipping Mobile Number</th>
                    <th scope="col">Order Total Amount</th>
                    <th scope="col">Status</th>
                    <th scope="col">Payment Status</th>
                    <th scope="col" class="text-right">Action</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            <div class="row">
                <div class="col-md-6">
                    <button class="btn btn-sm btn-success mt-4"><i class="fas fa-print"></i> Print Selected</button>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label><b>Change Status*</b></label>

                        <select name="status" class="form-control form-control-sm">
                            <option value="" >Select Status</option>
                            <option value="Processing">Processing</option>
                            <option value="Confirmed">Confirmed</option>
                            <option value="Hold">Hold</option>
                            <option value="In Courier">In Courier</option>
                            <option value="Delivered">Delivered</option>
                            <option value="Completed">Completed</option>
                            <option value="Canceled">Canceled</option>
                            <option value="Returned">Returned</option>
                        </select>
                    </div>

                    <button class="btn btn-sm btn-info" name="type" value="status_update">Change Selected</button>
                </div>
            </div>

            @if(($courier_config['steadfast_enabled'] ?? '') == 'Yes')
            <button class="btn btn-sm btn-info steadfastRequestBtn mb-1" type="button"><i class="fas fa-truck"></i> Submit Steadfast</button>
            @endif
        </div>
    </form>
</div>
@endsection

@section('footer')
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.23/datatables.min.js"></script>

<script>
    $('#dataTable').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "{{route('back.orders.table')}}",
            "dataType": "json",
            "type": "POST",
            "data": {_token: "{{csrf_token()}}", status: '{{$ref}}'}
        },
        "columns": [
            {"data": "select"},
            {"data": "id"},
            {"data": "date"},
            {"data": "order_name"},
            {"data": "full_address"},
            {"data": "mobile_number"},
            {"data": "total_amount"},
            {"data": "status"},
            {"data": "payment_status"},
            {"data": "action"}
        ],
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "order": [[1, "desc"]],
        "columnDefs": [
            { orderable: true, className: 'reorder', targets: [1] },
            { orderable: false, targets: '_all' }
        ],
        "drawCallback": function (settings) {
            $('.all_checkbox').prop('checked', false);
        }
    });

    $(document).on('change', '#mark_all', function(){
        if($(this).prop('checked')){
            $('.checkbox_items').prop('checked', true);
        }else{
            $('.checkbox_items').prop('checked', false);
        }
    });
</script>

@if(($courier_config['steadfast_enabled'] ?? '') == 'Yes')
<script>
    $(document).on('click', '.steadfastRequestBtn', function(){
        let orders = $('.checkbox_items:checked').map(function () {
            return $(this).val();
        });
        if(!orders.get().length){
            cAlert('error', 'Please some order!');
        }else{
            if(confirm('Are you sure to start Submitting!')){
                cLoader();
                $.ajax({
                    url: '{{route("orders.getForSteadFast")}}',
                    method: 'POST',
                    data: {_token, orders: orders.get()},
                    success: function(result){
                        cLoader('hide');
                        $('.listedItems tbody').html(result);
                        $('#submitSteadFastModal').modal('show');
                        uploadSteadfast();
                    },
                    error: function(){
                        cLoader('hide');
                        cAlert('error', 'Order fetched error!');
                    }
                });
            }
        }
    });

    function uploadSteadfast(){
        let queue_status = $('.queue_status:first');
        if(queue_status.length){
            let order_id = $(queue_status).closest('tr').find('.order_id').val();

            $('#sf_courier_item_' + order_id).closest('tr').find('.queue_status').remove();
            $.ajax({
                url: '{{route("orders.steadFastCreateAjax")}}',
                method: 'POST',
                data: {_token, order_id},
                success: function(result){
                    uploadSteadfast();
                    $('#sf_courier_item_' + order_id).find('.courier_status').html(result);
                },
                error: function(){
                    uploadSteadfast();
                }
            });
        }else{
            $('.steadFastLoading').html('Upload Done!');
        }
    }
</script>
<div class="modal fade" id="submitSteadFastModal" tabindex="-1" aria-labelledby="submitSteadFastModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="submitSteadFastModalLabel">Submit to Steadfast</h5>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body table-responsive listedItems">
            <table class="table table-sm table-bordered">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Address</th>
                        <th>COD</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
            <div class="text-center steadFastLoading">
                <i class="fas fa-spinner fa-spin" style="font-size: 20px"></i>
                <br>
                Uploading! Please wait. Do not close the window!
            </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>
@endif
@endsection
