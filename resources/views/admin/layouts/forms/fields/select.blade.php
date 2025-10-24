@php
$field_name = $select_name ?? 'active';
$array_control = [
    'class' => 'form-select form-control',
    'style' => 'width: 100%',
    'data-parsley-trigger' => 'select'
];

// Optional attributes
if (!empty($disable)) $array_control['disabled'] = 'disabled';
if (!empty($read_only)) $array_control['readonly'] = 'readonly';
if (!isset($not_req)) $array_control['required'] = '';
if (isset($is_multiple)) {
    $array_control['multiple'] = '';
    $field_name .= '[]';
}
if(isset($select2)) $array_control['class'] .= ' select2';

// لو معرفش select_id نعمله id فريد
if (isset($select_id)) {
    $array_control['id'] = $select_id;
} 
if (isset($select_class)) {
    $array_control['class'] = $select_class;
} 
@endphp

@include('admin.layouts.forms.fields.form-group-head', ['field_name' => $field_name])
@include('admin.layouts.forms.fields.label',['label_default'=>__("site.".$field_name)])

{{ html()->select($field_name, $select_function ?? booleanType(), $select_value ?? null)->attributes($array_control) }}

@include('admin.layouts.forms.fields.form-group-foot', ['field_name' => $field_name])
