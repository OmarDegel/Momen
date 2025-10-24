@php
$route_name = getRouteName($route_type ?? NULL);
@endphp
<a class="btn-main btn-block"
@if(isset($create_type) && isset($type_id))
href="{{ route("$route_name.$table.create",[$create_type=>$type_id]) }}">
@else
href="{{ route("$route_name.$table.create") }}">
@endif
<i class="icon-add"></i>   {{ $value ?? '' }}  </a>
