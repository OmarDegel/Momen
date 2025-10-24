<div class="form-group">
    @if(!isset($label_show))
        <label>{{ __('Role') }}</label>
    @endif

    {{
        html()->select('role_id', $regions, $role_id ?? null)
            ->class('select2')
            ->style('width: 100%')
            ->attributes(!isset($not_req) ? ['required' => ''] : [])
    }}
</div>
