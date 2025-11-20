<div class="form-group">
    <label>{{ __('Count Used') }}</label>

    {{
    html()->text('count_used', null)
    ->class('form-control')
    ->attribute('data-parsley-type', 'integer')
    }}
</div>