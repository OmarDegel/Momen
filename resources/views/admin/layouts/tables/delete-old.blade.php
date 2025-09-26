@php
    $route_name = getRouteName($route_type ?? null);
@endphp

<a id="delete" 
   data-id="{{ $id }}" 
   class="btn-width btn btn-{{ $btn_class ?? 'danger' }} fa fa-{{ $fa_class ?? 'trash' }}">
   <span>{{ $delete ?? '' }}</span>
</a>

{{-- {{ html()->form('DELETE', route("$route_name.$table.destroy", $id))->style('display:inline')->id("delete-form-$id") }}
    {{ html()->submit('Delete')
        ->class('d-none btn btn-danger delete-btn-submit')
        ->attribute('data-delete-id', $id) }}
{{ html()->closeModelForm() }} --}}
