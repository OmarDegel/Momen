<div class="form-group">
    <label>{{ __('site.email') }}</label>
    {{
    html()->text('email', $email ?? null)
    ->class('form-control')
    ->attribute('data-parsley-type', 'email')
    ->when(!isset($not_req), fn($field) => $field->required())
    }}
</div>