<div class="form-group">
    <label>{{ __('site.roles') }}</label>
    {{ html()->select('roles[]')
    ->options($roles)
    ->value($userRoles ?? null)
    ->class('select2')
    ->attribute('multiple', true)
    ->style('width: 100%')
    }}
</div>