<div class="form-group">
    <label>{{ __('Permissions') }}</label>
    {{
    html()->select('permission[]')
    ->options($permission)
    ->value($rolePermissions)
    ->class('select2')
    ->multiple()
    }}
</div>