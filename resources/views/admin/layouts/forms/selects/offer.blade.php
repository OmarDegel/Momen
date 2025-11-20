<div class="form-group">
    @if(!isset($label_show))
    <label>{{ __('Offer') }}</label>
    @endif
    {{ html()->select('offer', statusShow(), null)
    ->class('select2')
    ->required()
    ->style('width: 100%') }}
</div>