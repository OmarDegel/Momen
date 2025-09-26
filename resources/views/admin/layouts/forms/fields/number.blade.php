@php
$add_class = '';
if (isset($number_class)) {
    $add_class = $number_class;
}

$field_name = 'price';
if (isset($number_name)) {
    $field_name = $number_name;
}
$array_control = ['class' => 'form-control ' . $add_class, 'data-parsley-trigger' => 'input', 'disabled' => $disable ?? false, 'readonly' => $read_only ?? false, 'data-parsley-type' => $number_type ?? 'number'];
if (!isset($not_req)) {
    $array_control['required'] = '';
}
if (isset($number_id)) {
    $array_control['id'] = $number_id;
}
if (isset($min)) {
    $array_control['data-parsley-min'] = $min;
}
if (isset($max)) {
    $array_control['data-parsley-max'] = $max;
}
if (isset($placeholder)) {
    $array_control['placeholder'] = $placeholder;
}
if (isset($range)) {
    $array_control['data-parsley-range'] = $range;
}
@endphp
@include('admin.layouts.forms.fields.form-group-head', ['field_name' => $field_name])
@include('admin.layouts.forms.fields.label',['label_default'=>__("site." . $field_name)])
{{html()->number($field_name, $number_value ?? null)->attributes($array_control)}}
@include('admin.layouts.forms.fields.form-group-foot', ['field_name' => $field_name])
