<div class="form-group">
    <label>{{ __('English Address') }}</label>
    {{
    html()->text('address_en', $address_en ?? '')
    ->class('form-control')
    ->required()
    ->attribute('data-parsley-minlength', $minlength ?? '3')
    }}
</div>