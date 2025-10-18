    <?php 
    use App\Enums\StatusOrderEnum;
    ?>
    <div class="card mb-4">
         <div class="card-header">
             <h5 class="card-title m-0">{{ __('site.shipping_activity') }}</h5>
         </div>
         <div class="card-body">
             @if ($order->status != 'cancelled' || $order->status != 'returned' || $order->status != 'rejected')
                 <ul class="timeline pb-0 mb-0">

                     <li
                         class="timeline-item timeline-item-transparent {{ in_array($order->status, [
                             StatusOrderEnum::Request,
                             StatusOrderEnum::Pending,
                             StatusOrderEnum::Approved,
                             StatusOrderEnum::Preparing,
                             StatusOrderEnum::PreparingFinished,
                             StatusOrderEnum::DeliveryGo,
                             StatusOrderEnum::Delivered,
                         ])
                             ? 'border-primary'
                             : 'border-secondary' }}">

                         <span
                             class="timeline-point {{ in_array($order->status, [
                                 StatusOrderEnum::Request,
                                 StatusOrderEnum::Pending,
                                 StatusOrderEnum::Approved,
                                 StatusOrderEnum::Preparing,
                                 StatusOrderEnum::PreparingFinished,
                                 StatusOrderEnum::DeliveryGo,
                                 StatusOrderEnum::Delivered,
                             ])
                                 ? 'timeline-point-primary'
                                 : 'timeline-point-secondary' }}"></span>

                         <div class="timeline-event">
                             <div class="timeline-header">
                                 <h6 class="mb-0">{{ __('site.Request') }}</h6>
                             </div>
                         </div>
                     </li>

                     {{-- approved --}}
                     <li
                         class="timeline-item timeline-item-transparent {{ in_array($order->status, [
                             StatusOrderEnum::Approved,
                             StatusOrderEnum::Preparing,
                             StatusOrderEnum::PreparingFinished,
                             StatusOrderEnum::DeliveryGo,
                             StatusOrderEnum::Delivered,
                         ])
                             ? 'border-primary'
                             : 'border-secondary' }}">

                         <span
                             class="timeline-point {{ in_array($order->status, [
                                 StatusOrderEnum::Approved,
                                 StatusOrderEnum::Preparing,
                                 StatusOrderEnum::PreparingFinished,
                                 StatusOrderEnum::DeliveryGo,
                                 StatusOrderEnum::Delivered,
                             ])
                                 ? 'timeline-point-primary'
                                 : 'timeline-point-secondary' }}"></span>

                         <div class="timeline-event">
                             <div class="timeline-header">
                                 <h6 class="mb-0">{{ __('site.approved') }}</h6>
                             </div>
                         </div>
                     </li>

                     {{-- delivery_go --}}
                     <li
                         class="timeline-item timeline-item-transparent {{ in_array($order->status, [StatusOrderEnum::DeliveryGo, StatusOrderEnum::Delivered])
                             ? 'border-primary'
                             : 'border-secondary' }}">

                         <span
                             class="timeline-point {{ in_array($order->status, [StatusOrderEnum::DeliveryGo, StatusOrderEnum::Delivered])
                                 ? 'timeline-point-primary'
                                 : 'timeline-point-secondary' }}"></span>

                         <div class="timeline-event">
                             <div class="timeline-header">
                                 <h6 class="mb-0">{{ __('site.delivery_go') }}</h6>
                             </div>
                         </div>
                     </li>

                     {{-- delivered --}}
                     <li
                         class="timeline-item timeline-item-transparent {{ $order->status == StatusOrderEnum::Delivered ? 'border-primary' : 'border-secondary' }}">

                         <span
                             class="timeline-point {{ $order->status == StatusOrderEnum::Delivered ? 'timeline-point-primary' : 'timeline-point-secondary' }}"></span>

                         <div class="timeline-event">
                             <div class="timeline-header">
                                 <h6 class="mb-0">{{ __('site.delivered') }}</h6>
                             </div>
                         </div>
                     </li>
                 </ul>
             @endif
         </div>
     </div>
 </div>