<div class="form-group">
    @if(!isset($label_show))
    <label>{{ $show_name ?? __('Show') }}</label>
    @endif
    {{ html()->select($show_text ?? 'show', $show_function ?? showType(), $show_value ?? null)
    ->class('select2')
    ->style('width: 100%')
    ->required(!isset($not_req) ? true : false) }}
</div>