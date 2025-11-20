<div class="form-group">
    <label>{{ __('Use Count') }}</label>

    {{
    html()->text('use_count', null)
    ->class('form-control')
    ->attribute('data-parsley-type', 'integer')
    ->disabled()
    }}
</div>