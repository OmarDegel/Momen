<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title m-0">{{ __('site.returned_items') }}</h5>
    </div>

    <div class="card-body">
            <div class="border rounded-3 p-3 mb-4 shadow-sm">
                <div class="d-flex align-items-center mb-3">
                    @if($orderItemReturn->image)
                        <a href="{{ asset($orderItemReturn->image) }}" target="_blank">
                            <img src="{{ asset($orderItemReturn->image) }}" width="60" height="60" class="rounded-3 me-3">
                        </a>
                    @else
                        <div class="bg-light text-muted d-flex align-items-center justify-content-center rounded-3 me-3" style="width:60px;height:60px;">
                            <i class="ti ti-photo"></i>
                        </div>
                    @endif
                    <div>
                        <h6 class="mb-1">{{ __('site.order_id') }} #{{ $orderItemReturn->order_id }}</h6>
                        <small class="text-muted">{{ __('site.reason') }}: {{ $orderItemReturn->reason->nameLang() ?? '-' }}</small>
                    </div>
                    <span class="badge bg-label-primary ms-auto text-capitalize">{{ __($orderItemReturn->status->value) }}</span>
                </div>

                <div class="row mb-2">
                    <div class="col-md-6">
                        <strong>{{ __('site.user') }}:</strong> {{ $orderItemReturn->user->name_first }} {{ $orderItemReturn->user->name_last }}
                    </div>
                    <div class="col-md-6">
                        <strong>Order Item ID:</strong> {{ $orderItemReturn->order_item_id }}
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-4"><strong>{{ __('site.amount') }}:</strong> {{ $orderItemReturn->amount }}</div>
                    <div class="col-md-4"><strong>Free:</strong> {{ $orderItemReturn->free_amount }}</div>
                    <div class="col-md-4"><strong>Offer:</strong> {{ $orderItemReturn->offer_amount }}</div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-4"><strong>Actual:</strong> {{ $orderItemReturn->actual_amount }}</div>
                    <div class="col-md-4"><strong>Base Price:</strong> {{ number_format($orderItemReturn->price, 2) }}</div>
                    <div class="col-md-4"><strong>Return Price:</strong> {{ number_format($orderItemReturn->price_return, 2) }}</div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-6"><strong>Total Return:</strong> {{ number_format($orderItemReturn->total_price_return, 2) }}</div>
                    <div class="col-md-6"><strong>Coupon:</strong> {{ $orderItemReturn->coupon_type ?? '-' }} ({{ number_format($orderItemReturn->coupon_discount, 2) }})</div>
                </div>

                @if($orderItemReturn->note)
                    <div class="mt-2">
                        <strong>{{ __('site.note') }}:</strong> {{ $orderItemReturn->note }}
                    </div>
                @endif

                <div class="mt-3 text-muted small">
                    <div>{{ __('site.returned_at') }}: {{ $orderItemReturn->returned_at ?? '-' }}</div>
                    <div>{{ __('site.approved_by') }}: {{ $orderItemReturn->approvedBy->name ?? '-' }} ({{ $orderItemReturn->approved_at ?? '-' }})</div>
                    <div>{{ __('site.rejected_by') }}: {{ $orderItemReturn->rejectedBy->name ?? '-' }} ({{ $orderItemReturn->rejected_at ?? '-' }})</div>
                </div>
            </div>

    </div>
</div>

<div class="col-12 col-lg-8">