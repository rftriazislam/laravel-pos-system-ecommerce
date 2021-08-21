@extends('layouts/contentLayoutMaster')

@section('content')
    @php
        $refund_request_addon = \App\Addon::where('unique_identifier', 'refund_request')->first();
    @endphp

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><div></div></div>
                <div class="row">
                    <div class="col-12">
                        <form class="" id="sort_orders" action="" method="GET">
                            <div class="card-header row gutters-5">
                                <div class="col  text-md-left">
                                    <h5 class="mb-md-0 h6">{{ translate('All Orders') }}</h5>
                                </div>

                                <div class="col-lg-2 ml-auto">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-outline-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            {{ translate('Bulk Action') }}
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0);" href="#" onclick="bulk_delete()">
                                                {{ translate('Delete selection') }}
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Change Status Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">{{ translate('Choose an order status') }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <select class="form-control " onchange="change_status()"
                                                    data-minimum-results-for-search="Infinity" id="update_delivery_status">
                                                    <option value="pending">{{ translate('Pending') }}</option>
                                                    <option value="confirmed">{{ translate('Confirmed') }}</option>
                                                    <option value="picked_up">{{ translate('Picked Up') }}</option>
                                                    <option value="on_the_way">{{ translate('On The Way') }}</option>
                                                    <option value="delivered">{{ translate('Delivered') }}</option>
                                                    <option value="cancelled">{{ translate('Cancel') }}</option>
                                                </select>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-2 ml-auto">
                                    <select class="form-control " name="delivery_status" id="basicSelect" onchange="sort_orders()">
                                        <option value="pending" @if ($delivery_status == 'pending') selected @endif>{{ translate('Pending') }}</option>
                                        <option value="confirmed" @if ($delivery_status == 'confirmed') selected @endif>{{ translate('Confirmed') }}</option>
                                        <option value="picked_up" @if ($delivery_status == 'picked_up') selected @endif>{{ translate('Picked Up') }}</option>
                                        <option value="on_the_way" @if ($delivery_status == 'on_the_way') selected @endif>{{ translate('On The Way') }}</option>
                                        <option value="delivered" @if ($delivery_status == 'delivered') selected @endif>{{ translate('Delivered') }}</option>
                                        <option value="cancelled" @if ($delivery_status == 'cancelled') selected @endif>{{ translate('Cancel') }}</option>
                                    </select>
                                </div>


                                <div class="col-lg-2">
                                    <div class="form-group mb-0">
                                        <input type="text" class="form-control form-control-sm aiz-date-range" value="{{ $date }}" name="date" placeholder="{{ translate('Filter by date') }}" data-format="DD-MM-Y" data-separator=" to " data-advanced-range="true" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group mb-0">
                                        <input type="text" class="form-control" id="search" name="search" @isset($sort_search) value="{{ $sort_search }}" @endisset placeholder="{{ translate('Type Order code & hit Enter') }}">
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="form-group mb-0">
                                        <button type="submit" class="btn btn-primary">{{ translate('Filter') }}</button>
                                    </div>
                                </div>
                            </div>
                        </from>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                {{-- <th>#</th> --}}
                                <th>
                                    <div class="form-group">
                                        <div class="aiz-checkbox-inline">
                                            <label class="aiz-checkbox">
                                                <input type="checkbox" class="check-all">
                                                <span class="aiz-square-check"></span>
                                            </label>
                                        </div>
                                    </div>
                                </th>
                                <th>{{ translate('Order Code') }}</th>
                                <th data-breakpoints="md">{{ translate('Num. of Products') }}</th>
                                <th data-breakpoints="md">{{ translate('Customer') }}</th>
                                <th data-breakpoints="md">{{ translate('Amount') }}</th>
                                <th data-breakpoints="md">{{ translate('Delivery Status') }}</th>
                                <th data-breakpoints="md">{{ translate('Payment Status') }}</th>
                                @if ($refund_request_addon != null && $refund_request_addon->activated == 1)
                                    <th>{{ translate('Refund') }}</th>
                                @endif
                                <th class="text-right" width="15%">{{ translate('options') }}</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($orders as $key => $order)
                                <tr>
                                    <td>{{ $key + 1 + ($orders->currentPage() - 1) * $orders->perPage() }}</td>
                                    <td>
                                        <div class="form-group">
                                            <div class="aiz-checkbox-inline">
                                                <label class="aiz-checkbox">
                                                    <input type="checkbox" class="check-one" name="id[]"
                                                        value="{{ $order->id }}">
                                                    <span class="aiz-square-check"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $order->code }}</td>
                                    <td>{{ count($order->orderDetails) }}</td>
                                    <td>
                                        @if ($order->user != null)
                                            {{ $order->user->name }}
                                        @else
                                            Guest ({{ $order->guest_id }})
                                        @endif
                                    </td>
                                    <td>{{ single_price($order->grand_total) }}</td>
                                    <td>
                                        @php
                                            $status = $order->delivery_status;
                                            if ($order->delivery_status == 'cancelled') {
                                                $status = '<span class="badge badge-inline badge-danger">' . translate('Cancel') . '</span>';
                                            }
                                        @endphp
                                        {!! $status !!}
                                    </td>
                                    <td>
                                        @if ($order->payment_status == 'paid')
                                            <span class="badge badge-pill  badge-light-success">{{ translate('Paid') }}</span>
                                        @else
                                            <span class="badge badge-pill  badge-light-danger">{{ translate('Unpaid') }}</span>
                                        @endif
                                    </td>
                                    @if ($refund_request_addon != null && $refund_request_addon->activated == 1)
                                        <td>
                                            @if (count($order->refund_requests) > 0)
                                                {{ count($order->refund_requests) }} {{ translate('Refund') }}
                                            @else
                                                {{ translate('No Refund') }}
                                            @endif
                                        </td>
                                    @endif
                                    <td class="text-right">
                                        <a class="btn btn-soft-primary btn-icon rounded-circle btn-outline-secondary btn-sm" href="{{ route('all_orders.show', encrypt($order->id)) }}" title="{{ translate('View') }}">
                                            <i data-feather='eye'></i>
                                        </a>
                                        <a class="btn btn-soft-primary btn-icon rounded-circle btn-outline-secondary btn-sm" href="{{ route('invoice.download', $order->id) }}" title="{{ translate('Download Invoice') }}">
                                            <i data-feather='download'></i>
                                        </a>
                                        <a href="#" class="btn btn-icon rounded-circle btn-outline-danger btn-sm confirm-delete" data-href="{{ route('orders.destroy', $order->id) }}" title="{{ translate('Delete') }}">
                                            <i data-feather='trash-2'></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="aiz-pagination">
                    {{ $orders->appends(request()->input())->links() }}
                </div>
            </div>
        </div>
    </div>
    <!-- Basic Tables end -->
    <!--/ Complex Headers -->
@endsection

@section('modal')
    @include('modals.delete_modal')
@endsection

@section('script')
    <script type="text/javascript">
        $(document).on("change", ".check-all", function() {
            if (this.checked) {
                // Iterate each checkbox
                $('.check-one:checkbox').each(function() {
                    this.checked = true;
                });
            } else {
                $('.check-one:checkbox').each(function() {
                    this.checked = false;
                });
            }
        });

        // function change_status() {
        //    var data = new FormData($('#order_form')[0]);
        //    $.ajax({
        //        headers: {
        //            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //        },
        //        url: "{{ route('bulk-order-status') }}",
        //        type: 'POST',
        //        data: data,
        //        cache: false,
        //        contentType: false,
        //        processData: false,
        //        success: function (response) {
        //            if(response == 1) {
        //                location.reload();
        //            }
        //        }
        //    });
        // }

        function bulk_delete() {
            console.log('ss');
            var data = new FormData($('#sort_orders')[0]);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('bulk-order-delete') }}",
                type: 'POST',
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response == 1) {
                        location.reload();
                    }
                }
            });
        }
        $('.aiz-date-range').daterangepicker();
    </script>
@endsection

@section('vendor-script')
    <script src="{{ asset('public/js/scripts/components/components-dropdowns.js') }}"></script>
@endsection
