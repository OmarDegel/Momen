<div class="form-group">
    <label>{{ $name ?? __('Name') }}</label>
    @php
    $field_name = $name_text ?? 'name';
    $field_value = $name_value ?? null;
    $field_class = $name_class ?? 'form-control';
    $attributes = [
    'class' => $field_class,
    'data-parsley-minlength' => $minlength ?? '1',
    ];
    if(isset($data_type)) {
    $attributes['data-parsley-type'] = $data_type;
    }
    if(!isset($not_req)) {
    $attributes['required'] = true;
    }
    @endphp
    {{ html()->text($field_name, $field_value)->attributes($attributes) }}
</div>