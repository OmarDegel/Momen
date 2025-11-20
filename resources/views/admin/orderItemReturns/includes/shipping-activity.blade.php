@php
use App\Enums\StatusOrderItemReturnEnum;
use Carbon\Carbon;

// كل الحالات المتاحة من الـ Enum
$statuses = collect(StatusOrderItemReturnEnum::cases())
->mapWithKeys(fn($status) => [$status->value => ['label' => $status->label()]])
->toArray();

// الحالات اللي حصلت فعلاً في الداتابيز
$statusTimes = $orderItemReturn->statuses
? $orderItemReturn->statuses->pluck('created_at', 'status')->toArray()
: [];

$orderFlow = array_keys($statuses);

$currentIndex = array_search($orderItemReturn->status->value, $orderFlow);
@endphp

<div class="card mb-4">
    <div class="card-header">
        <h5 class="card-title m-0">{{ __('site.return_activity') }}</h5>
    </div>

    <div class="card-body">
        @if (!in_array($orderItemReturn->status, [
        StatusOrderItemReturnEnum::Canceled,
        StatusOrderItemReturnEnum::Rejected
        ]))
        <ul class="timeline pb-0 mb-0">
            @foreach ($statuses as $key => $data)
            @php
            $index = array_search($key, $orderFlow);
            $isActive = $index !== false && $index <= $currentIndex; $time=$statusTimes[$key] ?? null; @endphp <li
                class="timeline-item timeline-item-transparent {{ $isActive ? 'border-primary' : 'border-secondary' }}">
                <span
                    class="timeline-point {{ $isActive ? 'timeline-point-primary' : 'timeline-point-secondary' }}"></span>

                <div class="timeline-event">
                    <div class="timeline-header d-flex justify-content-between align-items-center">
                        <h6 class="mb-0">{{ $data['label'] }}</h6>
                        @if ($time)
                        <span class="text-muted">
                            {{ Carbon::parse($time)->translatedFormat('l h:i A') }}
                        </span>
                        @endif
                    </div>
                </div>
                </li>
                @endforeach
        </ul>
        @else
        <div class="alert alert-warning mb-0">
            <strong>{{ __('site.status') }}:</strong>
            {{ $orderItemReturn->status->label() }}
        </div>
        @endif
    </div>
</div>