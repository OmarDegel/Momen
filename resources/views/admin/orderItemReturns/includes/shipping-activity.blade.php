@php 
use App\Enums\StatusOrderItemReturnEnum;
@endphp

<div class="card mb-4">
    <div class="card-header">
        <h5 class="card-title m-0">{{ __('site.return_activity') }}</h5>
    </div>

    <div class="card-body">
        @if (!in_array($orderItemReturn->status, [StatusOrderItemReturnEnum::Canceled, StatusOrderItemReturnEnum::Rejected]))
            <ul class="timeline pb-0 mb-0">

                {{-- request --}}
                <li class="timeline-item timeline-item-transparent 
                    {{ in_array($orderItemReturn->status, [
                        StatusOrderItemReturnEnum::Request,
                        StatusOrderItemReturnEnum::Pending,
                        StatusOrderItemReturnEnum::Approved,
                        StatusOrderItemReturnEnum::Shipped,
                        StatusOrderItemReturnEnum::Delivered,
                    ]) ? 'border-primary' : 'border-secondary' }}">
                    
                    <span class="timeline-point 
                        {{ in_array($orderItemReturn->status, [
                            StatusOrderItemReturnEnum::Request,
                            StatusOrderItemReturnEnum::Pending,
                            StatusOrderItemReturnEnum::Approved,
                            StatusOrderItemReturnEnum::Shipped,
                            StatusOrderItemReturnEnum::Delivered,
                        ]) ? 'timeline-point-primary' : 'timeline-point-secondary' }}">
                    </span>
                    <div class="timeline-event">
                        <div class="timeline-header">
                            <h6 class="mb-0">{{ __('site.request') }}</h6>
                        </div>
                    </div>
                </li>

                {{-- pending --}}
                <li class="timeline-item timeline-item-transparent 
                    {{ in_array($orderItemReturn->status, [
                        StatusOrderItemReturnEnum::Pending,
                        StatusOrderItemReturnEnum::Approved,
                        StatusOrderItemReturnEnum::Shipped,
                        StatusOrderItemReturnEnum::Delivered,
                    ]) ? 'border-primary' : 'border-secondary' }}">
                    
                    <span class="timeline-point 
                        {{ in_array($orderItemReturn->status, [
                            StatusOrderItemReturnEnum::Pending,
                            StatusOrderItemReturnEnum::Approved,
                            StatusOrderItemReturnEnum::Shipped,
                            StatusOrderItemReturnEnum::Delivered,
                        ]) ? 'timeline-point-primary' : 'timeline-point-secondary' }}">
                    </span>
                    <div class="timeline-event">
                        <div class="timeline-header">
                            <h6 class="mb-0">{{ __('site.pending') }}</h6>
                        </div>
                    </div>
                </li>

                {{-- approved --}}
                <li class="timeline-item timeline-item-transparent 
                    {{ in_array($orderItemReturn->status, [
                        StatusOrderItemReturnEnum::Approved,
                        StatusOrderItemReturnEnum::Shipped,
                        StatusOrderItemReturnEnum::Delivered,
                    ]) ? 'border-primary' : 'border-secondary' }}">
                    
                    <span class="timeline-point 
                        {{ in_array($orderItemReturn->status, [
                            StatusOrderItemReturnEnum::Approved,
                            StatusOrderItemReturnEnum::Shipped,
                            StatusOrderItemReturnEnum::Delivered,
                        ]) ? 'timeline-point-primary' : 'timeline-point-secondary' }}">
                    </span>
                    <div class="timeline-event">
                        <div class="timeline-header">
                            <h6 class="mb-0">{{ __('site.approved') }}</h6>
                        </div>
                    </div>
                </li>

                {{-- shipped --}}
                <li class="timeline-item timeline-item-transparent 
                    {{ in_array($orderItemReturn->status, [
                        StatusOrderItemReturnEnum::Shipped,
                        StatusOrderItemReturnEnum::Delivered,
                    ]) ? 'border-primary' : 'border-secondary' }}">
                    
                    <span class="timeline-point 
                        {{ in_array($orderItemReturn->status, [
                            StatusOrderItemReturnEnum::Shipped,
                            StatusOrderItemReturnEnum::Delivered,
                        ]) ? 'timeline-point-primary' : 'timeline-point-secondary' }}">
                    </span>
                    <div class="timeline-event">
                        <div class="timeline-header">
                            <h6 class="mb-0">{{ __('site.shipped') }}</h6>
                        </div>
                    </div>
                </li>

                {{-- delivered --}}
                <li class="timeline-item timeline-item-transparent 
                    {{ $orderItemReturn->status == StatusOrderItemReturnEnum::Delivered ? 'border-primary' : 'border-secondary' }}">
                    
                    <span class="timeline-point 
                        {{ $orderItemReturn->status == StatusOrderItemReturnEnum::Delivered ? 'timeline-point-primary' : 'timeline-point-secondary' }}">
                    </span>
                    <div class="timeline-event">
                        <div class="timeline-header">
                            <h6 class="mb-0">{{ __('site.delivered') }}</h6>
                        </div>
                    </div>
                </li>
            </ul>
        @else
            {{-- canceled / rejected --}}
            <div class="alert alert-warning mb-0">
                <strong>{{ __('site.status') }}:</strong> 
                {{ __('site.' . $orderItemReturn->status->value) }}
            </div>
        @endif
    </div>
</div>
