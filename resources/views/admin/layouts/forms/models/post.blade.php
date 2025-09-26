<div class="form-group">
    @if(!isset($label_show))
        <label>{{ $product ?? __('Product') }}</label>
    @endif

    {{
        html()->select('post_id', $posts, $post_id ?? null)
            ->class('select2')
            ->style('width: 100%')
            ->attributes(!isset($not_req) ? ['required' => ''] : [])
    }}
</div>
