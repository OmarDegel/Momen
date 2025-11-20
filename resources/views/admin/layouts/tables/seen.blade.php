@php
    $function = $function ?? 'active';
@endphp


<td class="text-lg-center">
    @if (auth()->user()->hasPermission($model . '.active'))
        <button type="button"
            class="btn {{ $item->is_read ? 'btn-success' : 'btn-danger' }} {{ $function }}-{{ $model }} waves-effect waves-light seen-contacts"
            data-{{ $model }}-id="{{ $item->id }}"
            data-url="{{ route('dashboard.' . $model . '.seen', [$param => $item->id]) }}"
            @if ($item->is_read) disabled @endif>

            <i class="fa-solid {{ $item->is_read ? 'fa-check' : 'fa-circle-xmark' }}"></i>
        </button>
    @else
        <button disabled type="button" class="btn {{ $item->is_read ? 'btn-success' : 'btn-danger' }}">
            <i class="fa-solid {{ $item->is_read ? 'fa-check' : 'fa-circle-xmark' }}"></i>
        </button>
    @endif
</td>
