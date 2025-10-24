@php
    $route_name = getRouteName($route_type ?? null);
@endphp
@if (isset($model_id))
    @if (isset($model_type))
        <a href="{{ route("$route_name.$table.edit", [$id, $model_id]) }}">
        @else
            <a href="{{ route("$route_name.$table.edit", [$model_id, $id]) }}">
    @endif
@else
    <a href="{{ route("$route_name.$table.edit", $id) }}">
@endif
{{ $edit ?? '' }}  <i class="icon-edit"></i></a>
