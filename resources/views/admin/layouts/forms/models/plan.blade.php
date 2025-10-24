<div class="form-group">
    @if(!isset($label_show))
    <label>{{ __('Plan') }}</label>
    @endif

    {{
    html()->select('plan_id', $plans, $plan_id ?? null)
    ->class('select2')
    ->style('width: 100%')
    ->attributes(!isset($not_req) ? ['required' => ''] : [])
    }}
</div>