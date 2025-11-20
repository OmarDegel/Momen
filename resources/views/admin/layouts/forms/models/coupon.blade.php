<div class="form-group">
    @if(!isset($label_show))
        <label>{{ __('Coupon') }}</label>
    @endif

    {{
        html()->select('coupon_id', $coupons, $coupon_id ?? null)
            ->class('select2')
            ->style('width: 100%')
            ->attributes(!isset($not_req) ? ['required' => ''] : [])
    }}
</div>
