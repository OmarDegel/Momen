<div class="form-group">
    @if(!isset($label_show))
        <label>{{ __('Feature') }}</label>
    @endif
    {{ html()->select('feature', statusShow())
        ->class('select2')
        ->style('width: 100%')
        ->required() }}
</div>
