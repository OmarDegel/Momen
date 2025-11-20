<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">
        <div class="d-flex flex-column justify-content-center gap-2 gap-sm-0">
            <h5 class="mb-1 mt-3 d-flex flex-wrap gap-2 align-items-end">
                {{ $orderItemReturn->user->name }}
                @if($orderItemReturn->status->value == 'cancelled' || $orderItemReturn->status->value == 'returned' || $orderItemReturn->status->value == 'rejected')
                <span class="badge bg-label-alert
                ">
                {{ $orderItemReturn->status->label() }}
            </span>
            @else
            <span class="badge bg-label-success">
                {{ $orderItemReturn->status->label() }}
            </span>
            @endif
            </h5>
            <p class="text-body">{{ $orderItemReturn->created_at->diffForHumans() }}</p>
        </div>
        
    </div>