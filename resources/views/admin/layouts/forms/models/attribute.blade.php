<div class="form-group">
    @if(!isset($label_show))
        <label>{{ __('Attribute') }}</label>
    @endif

    {{ 
        html()->select('attribute_id', $attributes, $attribute_id ?? null)
            ->class('select2')
            ->style('width: 100%')
            ->attributes(!isset($not_req) ? ['required' => ''] : [])
    }}
</div>
