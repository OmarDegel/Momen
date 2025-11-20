<div class="form-group">
    <label>{{ __('Type') }}</label>
    {{ html()->select('type')
        ->options(userType())
        ->value(null)
        ->class('select2 user-type-role')
    }}
</div>
