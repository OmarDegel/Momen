<?php
use App\Enums\StatusOrderEnum;

?>
<td class="text-lg-center">
    @if (auth()->user()->hasPermission($model . '.active') &&
            in_array($item->status, [
                StatusOrderEnum::Request,
                StatusOrderEnum::Pending,
                StatusOrderEnum::Approved,
                StatusOrderEnum::Preparing,
                StatusOrderEnum::PreparingFinished,
                StatusOrderEnum::DeliveryGo,
            ]))
        <button type="button"
            class="btn {{ $item->active ? 'btn-success' : 'btn-danger' }}  cancel-orders waves-effect waves-light"
            data-{{ $model }}-id="{{ $item->id }}"
            data-url="{{ route('dashboard.' . $model . '.cancel', [$param => $item->id]) }}"
            id="cancel-{{ $item->id }}">
            <i class="fa-solid {{ $item->active ? 'fa-check' : 'fa-circle-xmark' }}"></i>
        </button>
    @endif
</td>
