<div class="card mb-4">
                <div class="card-header d-flex justify-content-between">
                    <h6 class="card-title m-0">Delivery Time</h6>
                </div>
                <div class="card-body">
                    <h6 class="mb-0 pb-2">No delivery time available.</h6>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between">
                    <h6 class="card-title m-0">{{ __('site.payment_details') }}</h6>
                </div>
                <div class="card-body">
                    <h6 class="mb-0 pb-2">{{ __('site.payment_method') }}: {{ $order->payment_method }}</h6>
                </div>
            </div>