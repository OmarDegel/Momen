<div class="form-group">
    @if(!isset($label_show))
    <label>{{ __('Finish') }}</label>
    @endif
    {{ html()->select('finish', statusShow())
    ->class('select2')
    ->required() }}
</div>