@php
$route_name = getRouteName($route_type ?? NULL);
@endphp

    <a class="btn-width btn-{{ $btn_class_block ?? 'block' }} btn btn-{{ $btn_class ?? 'success' }} ti ti-{{ $fa_class ?? 'plus' }}"
        target=""
        href="{{ route("$route_name.$table.create",[$type => $id]) }}"><span>{{ $value ?? '' }}</span></a>

