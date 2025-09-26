<div class="form-group">
    @if(!isset($label_show))
        <label>{{ __('Shipping') }}</label>
    @endif
    {{ html()->select('shipping', statusShow(), null)
        ->class('select2')
        ->required() }}
</div>
