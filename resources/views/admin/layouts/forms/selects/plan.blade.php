<div class="form-group">
    @if(!isset($label_show))
        <label>{{ __('Type') }}</label>
    @endif
    {{ html()->select('type', planType(), null)
        ->class('select2')
        ->required() }}
</div>
