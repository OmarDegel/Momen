<div class="form-group">
    @if(!isset($label_show))
    <label>{{ $label_text ?? __('Additions') }}</label>
    @endif

    {{
    html()->select('additions[]', $additions ?? [], $product_addition ?? null)
    ->class('select2')
    ->multiple()
    ->style('width: 100%')
    ->required(!isset($not_req))
    }}
</div>