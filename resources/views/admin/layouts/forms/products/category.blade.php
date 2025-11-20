<div class="form-group">
    @if(!isset($label_show))
    <label>{{ __('Categories') }}</label>
    @endif
    {{
    html()->select('categories[]', $categories, $product_category ?? null)
    ->class('select2')
    ->multiple()
    ->when(!isset($not_req), fn($el) => $el->required())
    ->style('width: 100%')
    }}
</div>