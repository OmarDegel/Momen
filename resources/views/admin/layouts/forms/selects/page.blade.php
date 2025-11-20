<div class="form-group">
    @if(!isset($label_show))
    <label>{{ __('Page') }}</label>
    @endif
    {{ html()->select('page_type', pageType($all ?? 'no'), null)
    ->class('select2')
    ->required() }}
</div>