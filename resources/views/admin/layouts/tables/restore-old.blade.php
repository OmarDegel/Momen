@php
    $route_name = getRouteName($route_type ?? null);
@endphp

@if(!isset($model_restore))
    <a data-toggle="tooltip"  
       id="restore" 
       data-id="{{ $id }}" 
       class="btn-width btn btn-{{ $restore_class ?? 'info' }} fa fa-{{ $restore_fa_class ?? 'undo' }}">
       <span>{{ $restore ?? '' }}</span>
    </a>

    {{ html()->form('DELETE', route("$route_name.$table.restore", $id))
        ->style('display:inline')
        ->id("restore-form-$id") }}
        {{ html()->submit('Delete')
            ->class('d-none btn btn-danger restore-btn-submit')
            ->attribute('data-restore-id', $id) }}
    {{ html()->closeModelForm() }}
@endif

{{-- 
@if(!isset($model_delete))
    <a data-toggle="tooltip"  id="force-delete" data-id="{{ $id }}" class="btn-width btn btn-{{ $delete_class ?? 'danger' }} fa fa-{{ $delete_fa_class ?? 'window-close' }}">
        <span>{{ $delete ?? '' }}</span>
    </a>
    {{ html()->form('DELETE', route("$route_name.$table.delete", $id))
        ->style('display:inline')
        ->id("force-delete-form-$id") }}
        {{ html()->submit('Delete')
            ->class('d-none btn btn-danger force-delete-btn-submit')
            ->attribute('data-force-delete-id', $id) }}
    {{ html()->closeModelForm() }}
@endif
--}}
