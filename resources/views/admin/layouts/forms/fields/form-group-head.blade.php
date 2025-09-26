@if (count($errors) > 0)
    <div class="form-group mt-2  {{ $errors->has($field_name) ? 'has-error' : '' }}" id="{{ $field_name }}_wrap">
@else
    <div class="form-group mt-2"  id="{{ $field_name }}_wrap">
@endif
