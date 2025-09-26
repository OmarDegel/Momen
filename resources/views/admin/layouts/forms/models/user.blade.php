<div class="form-group">
    @if(!isset($label_show))
        <label>{{ __('User') }}</label>
    @endif

    {{
        html()->select('user_id', $regions, $user_id ?? null)
            ->class('select2')
            ->style('width: 100%')
            ->attributes(!isset($not_req) ? ['required' => ''] : [])
    }}
</div>
