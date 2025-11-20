<div class="form-group">
    @if(!isset($label_show))
    <label>{{ __('Unit') }}</label>
    @endif
    {{ html()->select('unit', unitType(), null)
    ->class('select2')
    ->required() }}
</div>