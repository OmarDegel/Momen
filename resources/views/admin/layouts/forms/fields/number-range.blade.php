@php
    $add_class = $number_class ?? '';
    $field_name = $number_name ?? 'price';

    $array_control = [
        'class' => 'form-control ' . $add_class,
        'id' => $number_id ?? '',
        'data-parsley-range' => $range ?? '[0,100]',
        'data-parsley-trigger' => 'input',
        'disabled' => $disable ?? false,
        'readonly' => $read_only ?? false,
        'data-parsley-type' => $number_type ?? 'number',
    ];

    if (!isset($not_req)) {
        $array_control['required'] = true;
    }
@endphp

@include('admin.layouts.forms.fields.form-group-head', ['field_name' => $field_name])
@include('admin.layouts.forms.fields.label',['label_default'=>__("Price")])

{{ html()->number($field_name, $number_value ?? null)->attributes($array_control) }}

@include('admin.layouts.forms.fields.form-group-foot', ['field_name' => $field_name])
