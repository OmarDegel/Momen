<div class="form-group">
    @if(!isset($label_show))
        <label>{{ __('Max Order Active') }}</label>
    @endif
    {{ html()->select('is_max', statusShow(), null)
        ->class('select2')
        ->required()
        ->style('width: 100%') }}
</div>
