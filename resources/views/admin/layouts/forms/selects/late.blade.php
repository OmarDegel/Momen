<div class="form-group">
    @if(!isset($label_show))
    <label>{{ __('Preparing') }}</label>
    @endif
    {{ html()->select('is_late', statusShow())
    ->class('select2')
    ->required()
    ->style('width: 100%') }}
</div>