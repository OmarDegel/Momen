@php
$route_name = getRouteName($route_type ?? NULL);
@endphp
@if(isset($model_id))
@if(isset($model_type))
<a class=" {{ $btn_class ?? 'primary' }} ti ti-{{ $fa_class ?? 'edit' }}" href="{{ route("$route_name.$table.edit",[$id,$model_id]) }}"><span> {{ $edit ?? '' }} </span></a>
@else
<a class=" {{ $btn_class ?? 'primary' }} ti ti-{{ $fa_class ?? 'edit' }}" href="{{ route("$route_name.$table.edit",[$model_id,$id]) }}"><span> {{ $edit ?? '' }} </span></a>
@endif
@else
<a class=" {{ $btn_class ?? 'primary' }} ti ti-{{ $fa_class ?? 'edit' }}" href="{{ route("$route_name.$table.edit",$id) }}"><span> {{ $edit ?? '' }} </span></a>
@endif
