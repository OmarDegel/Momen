<div class="form-group">
    @if(!isset($label_show))
        <label>{{ __('Payment Type') }}</label>
    @endif
    {{ html()->select('payment_type', paymentType(), null)
        ->class('select2') }}
</div>
