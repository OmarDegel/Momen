<div class="card mb-4">
                <div class="card-header">
                    <h6 class="card-title m-0">{{ __('site.customer_details') }}</h6>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-start align-items-center mb-4">
                        <div class="avatar me-2">
                            @if($order->user->image)
                            <img src="{{ asset($order->user->image) }}" alt="Avatar" class="rounded-circle">
                            @else
                            <img src="{{ asset('images/default.png') }}" alt="Avatar" class="rounded-circle">
                            @endif
                        </div>
                        <div class="d-flex flex-column">
                            <a href="https://momen.manfazy.com/admin/users/12" class="text-body text-nowrap">
                                <h6 class="mb-0">{{ $order->user->name }}</h6>
                            </a>

                        </div>
                    </div>
                    <div class="d-flex justify-content-start align-items-center mb-4">
                        <span
                            class="avatar rounded-circle bg-label-success me-2 d-flex align-items-center justify-content-center">
                            <i class="ti ti-shopping-cart ti-sm"></i>
                        </span>
                        <h6 class="text-body text-nowrap mb-0">{{ $order->user->orders()->count() }} {{ __('site.orders') }}
                        </h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6>{{ __('site.address') }}</h6>

                    </div>
                    <p class="mb-1">Email: {{ $order->user->email ?? '' }}</p>
                    <p class="mb-0">Mobile: {{ $order->user->phone ?? '' }}</p>
                </div>
            </div>