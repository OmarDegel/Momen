@php
$add_class = 'datepicker'; // type="datetime-local","date"
if (isset($date_class)) {
$add_class = $date_class;
}

$array_control = [
'class' => 'form-control ' . $add_class,
'data-parsley-trigger' => 'input',
'disabled' => $disable ?? false,
'readonly' => $read_only ?? false,
];

if (!isset($not_req)) {
$array_control['required'] = true; // boolean بدل string
}

if (isset($date_id)) {
$array_control['id'] = $date_id;
}

$field_name = 'date';
if (isset($date_name)) {
$field_name = $date_name;
}
@endphp

@include('admin.layouts.forms.fields.form-group-head', ['field_name' => $field_name])
@include('admin.layouts.forms.fields.label', ['label_default' => $label_name ?? __("Date")])

<i class="ti ti-calendar calendar-icon" aria-hidden="true"></i>

{!!
html()
->text($field_name, $date_value ?? null)
->attributes($array_control)
!!}

@include('admin.layouts.forms.fields.form-group-foot', ['field_name' => $field_name])