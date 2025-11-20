<div class="form-group">
    @if(!isset($label_show))
    <label>{{ __('Branch') }}</label>
    @endif

    {{
    html()->select('branch_id', $branches, $branch_id ?? null)
    ->class('select2')
    ->style('width: 100%')
    ->attributes(!isset($not_req) ? ['required' => ''] : [])
    }}
</div>