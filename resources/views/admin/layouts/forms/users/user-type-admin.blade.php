<div class="form-group">
    <label>{{ __('site.type') }}</label>
    {{ html()->select('type')
        ->options(\App\Helpers\UserHelper::userType())
        ->value($type ?? null)
        ->class('select2 user-type-role')
        ->required()
    }}
</div>
