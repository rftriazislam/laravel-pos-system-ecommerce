@extends('layouts/contentLayoutMaster')

@section('content')
    @php
    $refund_request_addon = \App\Addon::where('unique_identifier', 'refund_request')->first();
    @endphp


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">

                    <div> </div>

                </div>
                <div class="row">
                    <div class="col-12">
                        <form class="" id="sort_orders" action="" method="GET">
                            <div class="card-header row gutters-5">
                                <div class="col text-center text-md-left">
                                    <h5 class="mb-md-0 h6">{{ translate('All Orders') }}</h5>
                                </div>


                                <div class="col-lg-2 ml-auto">
                                    <div class="dropdown mb-2 mb-md-0">
                                        <button class="btn border dropdown-toggle" type="button" data-toggle="dropdown">
                                            {{translate('Bulk Action')}}
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#" onclick="bulk_delete()"> {{translate('Delete selection')}}</a>
                        <!--                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModal">
                                                <i class="las la-sync-alt"></i>
                                                {{translate('Change Order Status')}}
                                            </a>-->
                                        </div>
                                    </div>

                                  </div>


                                  {{-- <div class="btn-group">
                                    <button
                                      type="button"
                                      class="btn btn-outline-primary dropdown-toggle"
                                      data-toggle="dropdown"
                                      aria-haspopup="true"
                                      aria-expanded="false"
                                    >
                                      Primary
                                    </button>
                                    <div class="dropdown-menu">
                                      <a class="dropdown-item" href="javascript:void(0);">Option 1</a>
                                      <a class="dropdown-item" href="javascript:void(0);">Option 2</a>
                                      <a class="dropdown-item" href="javascript:void(0);">Option 3</a>
                                      <div class="dropdown-divider"></div>
                                      <a class="dropdown-item" href="javascript:void(0);">Separated link</a>
                                    </div>
                                  </div> --}}

                                <div class="col-lg-2 ml-auto">
                                    <select class="form-control aiz-selectpicker" name="delivery_status"
                                        id="delivery_status" onchange="sort_orders()">
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
                                        <input type="text" class="aiz-date-range form-control" value="{{ $date }}"
                                            name="date" placeholder="{{ translate('Filter by date') }}"
                                            data-format="DD-MM-Y" data-separator=" to " data-advanced-range="true"
                                            autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group mb-0">
                                        <input type="text" class="form-control" id="search" name="search"
                                            @isset($sort_search) value="{{ $sort_search }}" @endisset
                                            placeholder="{{ translate('Type Order code & hit Enter') }}">
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
                                <!--<th>#</th>-->
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
                                    <!--                    <td>
                            {{ $key + 1 + ($orders->currentPage() - 1) * $orders->perPage() }}
                        </td>-->
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
                                    <td>
                                        {{ $order->code }}
                                    </td>
                                    <td>
                                        {{ count($order->orderDetails) }}
                                    </td>
                                    <td>
                                        @if ($order->user != null)
                                            {{ $order->user->name }}
                                        @else
                                            Guest ({{ $order->guest_id }})
                                        @endif
                                    </td>
                                    <td>
                                        {{ single_price($order->grand_total) }}
                                    </td>
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
                                            <span class="btn badge-inline btn-success">{{ translate('Paid') }}</span>
                                        @else
                                            <span class="btn badge-inline btn-danger">{{ translate('Unpaid') }}</span>
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
                                        <a class="avatar-content"
                                            href="{{ route('all_orders.show', encrypt($order->id)) }}"
                                            title="{{ translate('View') }}">
                                            <i data-feather='eye'></i>
                                        </a>
                                        <a class="btn btn-soft-primary btn-icon btn-circle btn-sm"
                                            href="{{ route('invoice.download', $order->id) }}"
                                            title="{{ translate('Download Invoice') }}">
                                            <i data-feather='download'></i>
                                        </a>
                                        <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete"
                                            data-href="{{ route('orders.destroy', $order->id) }}"
                                            title="{{ translate('Delete') }}">
                                            <i data-feather='delete'></i>
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

        //        function change_status() {
        //            var data = new FormData($('#order_form')[0]);
        //            $.ajax({
        //                headers: {
        //                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //                },
        //                url: "{{ route('bulk-order-status') }}",
        //                type: 'POST',
        //                data: data,
        //                cache: false,
        //                contentType: false,
        //                processData: false,
        //                success: function (response) {
        //                    if(response == 1) {
        //                        location.reload();
        //                    }
        //                }
        //            });
        //        }

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
    </script>
@endsection
@section('vendor-script')
<script src="{{asset('js/scripts/components/components-dropdowns.js')}}"></script>
@endsection
