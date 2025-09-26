<div class="form-group">
    @if(!isset($label_show))
        <label>{{ __('country') }}</label>
    @endif

    {{
        html()->select('country_id', $cities, $country_id ?? null)
            ->class('select2')
            ->style('width: 100%')
            ->attributes(!isset($not_req) ? ['required' => ''] : [])
    }}
</div>
