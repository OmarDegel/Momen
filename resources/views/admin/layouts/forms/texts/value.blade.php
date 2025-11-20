<div class="form-group">
    <label>{{ __('Name') }}</label>
    {{
    html()->text('value', null)
    ->class('form-control')
    ->attribute('data-parsley-minlength', '5')
    ->required()
    }}
</div>