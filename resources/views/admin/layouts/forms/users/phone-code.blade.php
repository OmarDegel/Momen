<div class="form-group">
    <label>{{ __('Phone Code') }}</label>
    {{ html()->text('phone_code')
        ->class('form-control')
        ->required() 
    }}
</div>
