<div class="form-group">
    @if(!isset($label_show))
    <label>{{ __('Sale') }}</label>
    @endif
    {{ html()->select('sale', statusShow(), null)
    ->class('select2')
    ->required() }}
</div>