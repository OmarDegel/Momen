@php
$route_name = getRouteName($route_type ?? NULL);
@endphp
<a id="delete" data-id="{{ $id }}">{{ $delete ?? '' }}<i class="icon-trash"></i></a>
<a data-delete-id="{{ $id }}" class="{{ $serivce_model ?? '' }}-delete hide d-none btn btn-danger delete-btn-submit"></a>

