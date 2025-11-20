<div class="form-group">
    <label>{{ $price ?? __('Price') }}</label>

    {{
    html()->text($price_text ?? 'price', $price_value ?? null)
    ->class('form-control')
    ->when(!isset($not_req), fn ($field) => $field->required())
    ->attribute('data-parsley-type', $price_type ?? 'number')
    }}
</div>