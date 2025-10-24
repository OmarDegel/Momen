<div class="form-group">
        <label>{{ __('Use Limit') }}</label>

        {{
        html()->text('use_limit', null)
        ->class('form-control')
        ->attribute('data-parsley-type', 'integer')
        }}
</div>