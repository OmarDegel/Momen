@php
    $function = $function ?? 'active';
@endphp


<td class="text-lg-center">
    @if (auth()->user()->hasPermission($model.'.active'))
        <button type="button"
            class="btn {{  $item->$function? 'btn-success' : 'btn-danger' }} waves-effect waves-light"
            data-id="{{ $item->id }}"
            data-url="{{ route('dashboard.'.$model.'.'.$function, [$param => $item->id]) }}"
            data-full-class="{{ $function }}-{{ $model }}">

            <i class="fa-solid {{ $item->$function ? 'fa-check' : 'fa-circle-xmark' }}"></i>
        </button>
    @else
        <button disabled type="button"
            class="btn {{ $item->$function ? 'btn-success' : 'btn-danger' }}">
            <i class="fa-solid {{ $item->$function ? 'fa-check' : 'fa-circle-xmark' }}"></i>
        </button>
    @endif

</td>

