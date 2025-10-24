<div class="form-group">
    @if(!isset($label_show))
        <label>{{ __('Currency') }}</label>
    @endif

    {{
        html()->select('currency_id', $currencies, $currency_id ?? null)
            ->class('select2')
            ->style('width: 100%')
            ->attributes(!isset($not_req) ? ['required' => ''] : [])
    }}
</div>
