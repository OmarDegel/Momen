<div class="form-group">
    <label>{{ __('site.phone') }}</label>
    {{ html()->text('phone', $phone ?? null)
        ->class('form-control')
        ->required()
        ->attribute('data-parsley-type', 'number')
    }}
</div>
