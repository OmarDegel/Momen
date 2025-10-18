
 <div class="col-12 col-lg-8">
     <div class="card mb-4">
         <div class="card-header d-flex justify-content-between align-items-center">
             <h5 class="card-title m-0">{{ __('site.order_details') }}</h5>

         </div>
         <div class="card-datatable table-responsive">
             <table class="datatables-order-details table border-top">
                 <thead>
                     <tr>
                         <th></th>
                         <th class="w-50 text-lg-center">{{ __('site.product') }}</th>
                         <th class="w-25 text-lg-center">{{ __('site.price') }}</th>
                         <th class="w-25 text-lg-center">{{ __('site.quantity') }}</th>
                         <th>{{ __('site.total') }}</th>
                     </tr>

                 </thead>
                 <tbody>
                     @foreach ($order->orderItems as $orderItem)
                         <tr class="odd">
                             <td class="sorting_1">
                                 <div class="d-flex justify-content-start align-items-center text-nowrap">
                                     <div class="avatar-wrapper">
                                         <div class="avatar me-2">
                                             <img src="{{ asset($orderItem->product->image) }}" class="rounded-2">
                                         </div>
                                     </div>
                                 </div>
                             </td>
                             <td class="text-lg-center">
                                 <div class="d-flex flex-column">
                                     <h6 class="text-body mb-0">
                                         {{ $orderItem->product->nameLang() }}
                                     </h6>
                                     <small class="text-muted">
                                     </small>
                                 </div>
                             </td>
                             <td class="text-lg-center">
                                 <span>
                                     {{ $orderItem->price }}
                                 </span>
                             </td>
                             <td class="text-lg-center">
                                 <span class="text-body">
                                     {{ $orderItem->amount }}
                                 </span>
                             </td>
                             <td class="text-lg-center">
                                 <h6 class="mb-0">

                                     {{ $orderItem->price * $orderItem->amount }}
                                 </h6>
                             </td>
                         </tr>
                     @endforeach

                 </tbody>
             </table>
             <div class="d-flex justify-content-end align-items-center m-3 mb-2 p-1">
                 <div class="order-calculations">
                     <div class="d-flex justify-content-between mb-2">
                         <span class="w-px-100 text-heading">{{ __('site.subtotal') }}:</span>
                         <h6 class="mb-0">

                             {{ $order->price }}</h6>
                     </div>
                     <div class="d-flex justify-content-between mb-2">
                         <span class="w-px-100 text-heading">{{ __('site.discount') }}:</span>
                         <h6 class="mb-0">

                             {{ $order->discount }}</h6>
                     </div>
                     <div class="d-flex justify-content-between mb-2">
                         <span class="w-px-100 text-heading">{{ __('site.shipping') }}:</span>
                         <h6 class="mb-0">

                             {{ $order->shipping() }}</h6>
                     </div>
                    

                     <div class="d-flex justify-content-between">
                         <h6 class="w-px-100 mb-0">{{ __('site.total') }}:</h6>
                         <h6 class="mb-0">
                             {{ $order->orderTotal()  }}</h6>
                         EGP
                     </div>
                 </div>
             </div>
         </div>
     </div>
