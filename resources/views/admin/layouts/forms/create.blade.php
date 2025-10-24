@php
$route_name = /*getRouteName($route_type ?? null)*/ null;
$add_class = '';
$route_method = 'POST';
$is_validate = 'yes';
$route_validate = 'data-parsley-validate';
$route_validate_type = 'parsley';
$autocomplete = 'off';
$route_status = 'store';
if (isset($form_class)) {
$add_class = $form_class;
}
if (isset($form_method)) {
$route_method = $form_method;
}
if (isset($form_autocomplete)) {
$autocomplete = $form_autocomplete;
}
if (isset($form_validate)) {
$is_validate = $form_validate;
}
if (isset($form_status)) {
$route_status = $form_status;
}
$form_control = [
'method' => $route_method,
'class' => 'systemira-form ' . $add_class,
'autocomplete' => $autocomplete,
];
if ($is_validate == 'yes') {
$form_control[$route_validate] = $route_validate_type;
}
if (isset($enctype)) {
$form_control['enctype'] = 'multipart/form-data';
}

if (isset($model_id) && isset($table_parent)) {
$form_control['route'] = ["$route_name.$table_parent.$table.$route_status", $model_id];
} elseif (isset($model_id) && !isset($table_parent)) {
$form_control['route'] = ["$route_name.$table.$route_status", $model_id];
} else {
$form_control['route'] = "$table.$route_status";
}
$form_control['id'] = 'formDropzone';
@endphp
<div class="col-lg-12 margin-tb mb-1 mb-2">
    <div class="pull-left">
        <a class="btn btn-primary ti ti-arrow-left waves-effect waves-light" href="{{ route("$table.index") }}"></a>
    </div>
</div>
{!!
html()->form(
$form_control['method'] ?? 'POST',
is_array($form_control['route'])
? route($form_control['route'][0], $form_control['route'][1] ?? null)
: route($form_control['route'])
)
->class($form_control['class'] ?? '')
->id($form_control['id'] ?? '')
->attribute('autocomplete', $form_control['autocomplete'] ?? 'off')
->attributes(
collect($form_control)
->except(['method','route','class','id','autocomplete'])
->toArray()
)
->open()
!!}