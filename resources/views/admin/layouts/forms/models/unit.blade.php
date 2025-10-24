<div class="form-group">
    @if(!isset($label_show))
        <label>{{ __('Unit') }}</label>
    @endif

    {{
        html()->select('unit_id', $regions, $unit_id ?? null)
            ->class('select2')
            ->style('width: 100%')
            ->attributes(!isset($not_req) ? ['required' => ''] : [])
    }}
</div>
