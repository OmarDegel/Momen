<div class="card mb-4">
    <div class="card-header d-flex justify-content-between">
        <h6 class="card-title m-0">{{ __('site.shipping_details') }}</h6>

    </div>
    <div class="card-body">
        <span class="badge bg-label-info">
            {{ $order->address->type }}
        </span>
        <p class="mb-1">{{ __('site.address') }}: {{ $order->address->address ?? '' }} </p>
        <p class="mb-1">{{ __('site.city') }}: {{ $order->address->city->nameLang() ?? '' }} </p>
        <p class="mb-1">{{ __('site.building') }}: {{ $order->address->building ?? '' }} </p>
        <p class="mb-1">{{ __('site.floor') }}: {{ $order->address->floor ?? '' }}</p>
        <p class="mb-1">{{ __('site.additional_info') }}: {{ $order->address->additional_info ?? '' }}</p>
        <p></p>
    </div>
</div>
