<div class="form-group">
    @if(!isset($label_show))
        <label>{{ __('Filter') }}</label>
    @endif
    {{ html()->select('filter', statusShow())
        ->class('select2')
        ->style('width: 100%')
        ->required() }}
</div>
