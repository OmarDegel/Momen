@php
$route_name = getRouteName($route_type ?? null);
@endphp

{{ html()->form('POST', route("$route_name.$table.status", $id))
->style('display:inline') }}
{{ html()->button()->class('fa fa-' . ($success_fa ?? 'check') . ' btn-width btn btn-' . ($btn_class ??
'success'))->type('submit') }}
{{ html()->closeModelForm() }}