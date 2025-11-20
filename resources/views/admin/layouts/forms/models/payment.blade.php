<div class="form-group">
    @if(!isset($label_show))
        <label>{{ __('Payment') }}</label>
    @endif

    {{
        html()->select('payment_id', $payments, $payment_id ?? null)
            ->class('select2')
            ->style('width: 100%')
            ->attributes(!isset($not_req) ? ['required' => ''] : [])
    }}
</div>
