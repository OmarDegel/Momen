@php
$route_name = getRouteName($route_type ?? NULL);
@endphp
@if(!isset($model_show))
<a href="{{ route("$route_name.$table.show",$id) }}">
@elseif(isset($route_all))
<a href="{{ route("$route_name.$route_all",$id) }}">
@endif
{{ $show ?? '' }}  <i class="icon-arrow-left"></i></a>
