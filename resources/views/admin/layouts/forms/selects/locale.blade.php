<div class="form-group">
    @if(!isset($label_show))
    <label>{{ $locale_name ?? __('Locale') }}</label>
    @endif
    {{ html()->select($locale_text ?? 'locale', languageType(), $locale_value ?? null)
    ->class('select2')
    ->required() }}
</div>