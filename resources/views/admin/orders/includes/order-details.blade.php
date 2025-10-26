<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title m-0">{{ __('site.order_details') }}</h5>
        <span class="badge bg-label-primary text-capitalize">{{ $order->status->label() }}</span>
    </div>

    <div class="card-body">
        <div class="border rounded-3 p-3 mb-4 shadow-sm">
            {{-- USER INFO --}}
            <div class="d-flex align-items-center mb-3">
                @if($order->user && $order->user->image)
                <a href="{{ asset($order->user->image) }}" target="_blank">
                    <img src="{{ asset($order->user->image) }}" width="60" height="60" class="rounded-3 me-3">
                </a>
                @else
                <div class="bg-light text-muted d-flex align-items-center justify-content-center rounded-3 me-3"
                    style="width:60px;height:60px;">
                    <i class="ti ti-user"></i>
                </div>
                @endif

                <div>
                    <h6 class="mb-1">{{ $order->user->name ?? __('site.guest_user') }}</h6>
                    <small class="text-muted">{{ __('site.email') }}: {{ $order->user->email ?? '-' }}</small><br>
                    <small class="text-muted">{{ __('site.phone') }}: {{ $order->user->phone ?? '-' }}</small>
                </div>
            </div>

            {{-- ORDER INFO --}}
            <div class="row mb-3">
                <div class="col-md-4"><strong>{{ __('site.order_id') }}:</strong> #{{ $order->id }}</div>
                <div class="col-md-4"><strong>{{ __('site.payment') }}:</strong> {{ $order->payment->nameLang() ?? '-'
                    }}</div>
                <div class="col-md-4"><strong>{{ __('site.address') }}:</strong>
                    <td class="text-lg-center">
                        <a href="https://www.google.com/maps?q={{ $order->address->latitude }},{{ $order->address->longitude }}"
                            target="_blank">
                            <button disabled type="button"
                                class="btn btn-success active-cities waves-effect waves-light">
                                <i class="fa-solid fa-location-dot"></i>
                            </button>
                        </a>
                    </td>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4"><strong>{{ __('site.city') }}:</strong> {{ $order->city->nameLang() ?? '-' }}
                </div>
                {{-- <div class="col-md-4"><strong>{{ __('site.region') }}:</strong> {{ $order->region->nameLang() ??
                    '-' }}</div> --}}
                <div class="col-md-4"><strong>{{ __('site.delivery_time') }}:</strong> {{
                    $order->deliveryTime->nameLang() ?? '-' }}</div>
            </div>

            {{-- PRICES --}}
            <div class="row mb-2">
                <div class="col-md-4"><strong>{{ __('site.price') }}:</strong> {{ number_format($order->price, 2) }}
                </div>
                <div class="col-md-4"><strong>{{ __('site.shipping') }}:</strong> {{ number_format($order->shipping, 2)
                    }}</div>
                <div class="col-md-4"><strong>{{ __('site.tax') }}:</strong> {{ number_format($order->tax, 2) }}</div>
            </div>

            <div class="row mb-2">
                <div class="col-md-4"><strong>{{ __('site.discount') }}:</strong> {{ number_format($order->discount, 2)
                    }}</div>
                <div class="col-md-4"><strong>{{ __('site.coupon') }}:</strong> {{ $order->coupon_type ?? '-' }} ({{
                    number_format($order->coupon_discount, 2) }})</div>
                <div class="col-md-4"><strong>{{ __('site.total') }}:</strong> {{ number_format($order->total, 2) }}
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-md-4"><strong>{{ __('site.paid') }}:</strong> {{ number_format($order->paid, 2) }}</div>
                <div class="col-md-4"><strong>{{ __('site.remaining') }}:</strong> {{ number_format($order->remaining,
                    2) }}</div>
                <div class="col-md-4"><strong>{{ __('site.wallet') }}:</strong> {{ number_format($order->wallet, 2) }}
                </div>
            </div>

            {{-- NOTES --}}
            @if($order->note || $order->admin_note || $order->delivery_note)
            <div class="mt-3">
                @if($order->note)
                <div><strong>{{ __('site.note') }}:</strong> {{ $order->note }}</div>
                @endif
                @if($order->admin_note)
                <div><strong>{{ __('site.admin_note') }}:</strong> {{ $order->admin_note }}</div>
                @endif
                @if($order->delivery_note)
                <div><strong>{{ __('site.delivery_note') }}:</strong> {{ $order->delivery_note }}</div>
                @endif
            </div>
            @endif

            {{-- META --}}
            <div class="mt-3 text-muted small">
                <div>{{ __('site.created_at') }}: {{ $order->created_at }}</div>
                <div>{{ __('site.updated_at') }}: {{ $order->updated_at }}</div>
                <div>{{ __('site.cancel_by') }}: {{ $order->cancel_by ?? '-' }} ({{ $order->cancel_date ?? '-' }})</div>
            </div>
        </div>
    </div>
</div>