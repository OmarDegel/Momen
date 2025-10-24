@php
$route_name = getRouteName($route_type ?? NULL);
@endphp
<a class="btn-width {{ $btn_class ?? 'success' }} ti ti-{{ $fa_class ?? 'book' }}"
    @if(isset($type_array))
    href="{{ route("$route_name.$table.index",[$type => $type_value ,$type_array => $type_array_value]) }}"
    @else
    href="{{ route("$route_name.$table.index",[$type => $type_value]) }}"
    @endif>
    <span> {{ $value ?? '' }} </span>
</a>
