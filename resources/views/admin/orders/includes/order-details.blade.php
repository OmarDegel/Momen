<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title m-0">{{ __('site.order_details') }}</h5>
    </div>

    <div class="card-datatable table-responsive">
        <table class="datatables-order-details table border-top">
            <thead>
                <tr>
                    <th></th>
                    <th class="text-lg-center">{{ __('site.product') }}</th>
                    <th class="text-lg-center">Product Child ID</th>
                    <th class="text-lg-center">Offer Price</th>
                    <th class="text-lg-center">Base Price</th>
                    <th class="text-lg-center">Amount</th>
                    <th class="text-lg-center">Price Addition</th>
                    <th class="text-lg-center">Amount Addition</th>
                    <th class="text-lg-center">Offer Amount</th>
                    <th class="text-lg-center">Offer Amount Add</th>
                    <th class="text-lg-center">Free Amount</th>
                    <th class="text-lg-center">Total Amount</th>
                    <th class="text-lg-center">Shipping</th>
                    <th class="text-lg-center">Total</th>
                    <th class="text-lg-center">Total Price</th>
                    <th class="text-lg-center">Is Return</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($order->orderItems as $orderItem)
                <tr>
                    {{-- صورة المنتج --}}
                    <td class="text-center">
                        <div class="avatar-wrapper">
                            <div class="avatar me-2">
                                <img src="{{ asset($orderItem->product->image) }}" class="rounded-2" width="40"
                                    height="40" alt="">
                            </div>
                        </div>
                    </td>

                    <td class="text-lg-center">
                        <strong>{{ $orderItem->product->nameLang() }}</strong>
                    </td>

                    <td class="text-lg-center">{{ $orderItem->product_child_id ?? '-' }}</td>
                    <td class="text-lg-center">{{ number_format($orderItem->offer_price, 2) }}</td>
                    <td class="text-lg-center">{{ number_format($orderItem->price, 2) }}</td>
                    <td class="text-lg-center">{{ $orderItem->amount }}</td>
                    <td class="text-lg-center">{{ number_format($orderItem->price_addition, 2) }}</td>
                    <td class="text-lg-center">{{ $orderItem->amount_addition }}</td>
                    <td class="text-lg-center">{{ $orderItem->offer_amount }}</td>
                    <td class="text-lg-center">{{ $orderItem->offer_amount_add }}</td>
                    <td class="text-lg-center">{{ $orderItem->free_amount }}</td>
                    <td class="text-lg-center">{{ $orderItem->total_amount }}</td>
                    <td class="text-lg-center">{{ number_format($orderItem->shipping, 2) }}</td>
                    <td class="text-lg-center">{{ number_format($orderItem->total, 2) }}</td>
                    <td class="text-lg-center">{{ number_format($orderItem->total_price, 2) }}</td>
                    <td class="text-lg-center">
                        @if($orderItem->is_return)
                        <span class="badge bg-danger">Returned</span>
                        @else
                        <span class="badge bg-success">Active</span>
                        @endif
                    </td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>

        {{-- حسابات الطلب --}}
        <div class="d-flex justify-content-end align-items-center m-3 mb-2 p-1">
            <div class="order-calculations">
                <div class="d-flex justify-content-between mb-2">
                    <span class="w-px-100 text-heading">{{ __('site.subtotal') }}:</span>
                    <h6 class="mb-0">{{ number_format($order->price, 2) }}</h6>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span class="w-px-100 text-heading">{{ __('site.discount') }}:</span>
                    <h6 class="mb-0">{{ number_format($order->discount, 2) }}</h6>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span class="w-px-100 text-heading">{{ __('site.shipping') }}:</span>
                    <h6 class="mb-0">{{ number_format($order->shipping, 2) }}</h6>
                </div>
                <div class="d-flex justify-content-between">
                    <h6 class="w-px-100 mb-0">{{ __('site.total') }}:</h6>
                    <h6 class="mb-0">{{ number_format($order->total, 2) }} EGP</h6>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-12 col-lg-8">