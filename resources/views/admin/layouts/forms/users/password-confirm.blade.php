<div class="form-group">
    <label>{{ __('site.confirm_password') }}</label>
    {{
        html()->password('password_confirmation')
            ->class('form-control')
            ->id('password-confirm')
            ->attribute('data-parsley-minlength', '8')
            ->attribute('data-parsley-equalto', '#password')
            ->when($new > 0, fn($field) => $field->required())
    }}
</div>
