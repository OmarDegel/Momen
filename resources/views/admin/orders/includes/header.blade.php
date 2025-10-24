<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">
        <div class="d-flex flex-column justify-content-center gap-2 gap-sm-0">
            <h5 class="mb-1 mt-3 d-flex flex-wrap gap-2 align-items-end">
                {{ $order->user->name }}
                @if($order->status->value == 'cancelled' || $order->status->value == 'returned' || $order->status->value == 'rejected')
                <span class="badge bg-label-alert
                ">
                {{ $order->status->label() }}
            </span>
            @else
            <span class="badge bg-label-success">
                {{ $order->status->label() }}
            </span>
            @endif
            </h5>
            <p class="text-body">{{ $order->created_at->diffForHumans() }}</p>
        </div>
        
    </div>