<div class="form-group">
    @if(!isset($label_show))
        <label>{{ __('City') }}</label>
    @endif

    {{
        html()->select('city_id', $cities, $city_id ?? null)
            ->class('select2')
            ->style('width: 100%')
            ->attributes(!isset($not_req) ? ['required' => ''] : [])
    }}
</div>
