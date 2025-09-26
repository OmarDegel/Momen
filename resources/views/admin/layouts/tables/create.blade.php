@php
$route_name = getRouteName($route_type ?? NULL);
@endphp
<a class="btn-main btn-block"
target=""
href="{{ route("$route_name.$table.create",[$type => $id]) }}">
<i class="icon-add"></i>  {{ $value ?? '' }}  </a>
