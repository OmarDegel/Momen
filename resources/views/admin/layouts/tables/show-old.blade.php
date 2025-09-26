@php
$route_name = getRouteName($route_type ?? NULL);
@endphp
@if(!isset($model_show))
<a class="btn-width btn btn-{{ $btn_class ?? 'info' }} ti ti-{{ $fa_class ?? 'eye' }}" href="{{ route("$route_name.$table.show",$id) }}"><span> {{ $show ?? '' }} </span></a>
@elseif(isset($route_all))
<a class="btn-width btn btn-{{ $btn_class ?? 'danger' }} ti ti-{{ $fa_class ?? 'star' }}" href="{{ route("$route_name.$route_all",$id) }}"><span> {{ $show ?? '' }} </span></a>
@endif
