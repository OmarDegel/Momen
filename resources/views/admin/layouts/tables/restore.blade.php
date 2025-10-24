@php
$route_name = getRouteName($route_type ?? NULL);
@endphp
{{--  @if(!isset($model_restore))  --}}
<a data-toggle="tooltip"  id="restore" data-id="{{ $id }}" class="btn-width btn btn-{{ $restore_class ?? 'info' }} fa fa-{{ $restore_fa_class ?? 'undo' }}"><span>{{ $restore ?? '' }}</span></a>
<a data-restore-id="{{ $id }}" class="{{ $serivce_model }}-restore hide btn btn-danger restore-btn-submit"></a>
{{--  {!! Form::open(['method' => 'DELETE','route' => ["$route_name.$table.restore", $id],'style'=>'display:inline']) !!}
{!! Form::submit('Delete', ['class' => 'hide btn btn-danger restore-btn-submit','data-restore-id' => $id]) !!}
@include('admin.layouts.forms.close')  --}}
{{-- @endif
 @if(!isset($model_delete))
<a data-toggle="tooltip"  id="force-delete" data-id="{{ $id }}" class="btn-width btn btn-{{ $delete_class ?? 'danger' }} fa fa-{{ $delete_fa_class ?? 'window-close' }}"><span>{{ $delete ?? '' }}</span></a>
{!! Form::open(['method' => 'DELETE','route' => ["$route_name.$table.delete", $id],'style'=>'display:inline']) !!}
{!! Form::submit('Delete', ['class' => 'hide btn btn-danger force-delete-btn-submit','data-force-delete-id' => $id]) !!}
@include('admin.layouts.forms.close')
@endif  --}}

