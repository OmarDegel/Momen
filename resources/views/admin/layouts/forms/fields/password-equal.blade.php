@php
$add_class = $text_class ?? '';
$field_name = $text_name ?? 'confirm-password';

$array_control = [
'class' => 'form-control ' . $add_class,
'data-parsley-minlength' => $minlength ?? '8',
'id' => $text_id ?? '',
'data-parsley-trigger' => 'input',
'disabled' => $disable ?? false,
'readonly' => $read_only ?? false,
'data-parsley-equalto' => $equalto ?? '#password',
];

if (!isset($not_req)) {
$array_control['required'] = '';
}
@endphp

@include('admin.layouts.forms.fields.form-group-head', ['field_name' => $field_name])

@if (!isset($label_show))
<label>{{ $label_name ?? __('Confirm Password') }}</label>
@endif

{{ html()->password($field_name)
->attributes($array_control) }}

@include('admin.layouts.forms.fields.form-group-foot', ['field_name' => $field_name])