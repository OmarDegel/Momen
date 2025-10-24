@php
    $route_name = getRouteName($route_type ?? null);
@endphp

<a id="delete" data-id="{{ $id }}" class="ti ti-trash" href="#">{{ $delete ?? '' }}</a>

{{ html()->form('DELETE', route("$route_name.$table.destroy", $id))->style('display:inline') }}
    {{ html()->submit('Delete')
        ->class('d-none btn btn-danger delete-btn-submit')
        ->attribute('data-delete-id', $id) }}
{{ html()->closeModelForm() }}
