<div class="form-group">
    @if(!isset($label_show))
        <label>{{ __('Package') }}</label>
    @endif

    {{
        html()->select('package_id', $packages, $package_id ?? null)
            ->class('select2')
            ->style('width: 100%')
            ->attributes(!isset($not_req) ? ['required' => ''] : [])
    }}
</div>
