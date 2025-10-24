<div class="form-group">
    <label>{{ $date_label ?? __('Date') }}</label>

    {!!
    html()
    ->text($date_text ?? 'date', $date_value ?? null)
    ->class($date_class ?? 'form-control datepicker')
    ->when(!isset($not_req), fn($input) => $input->attribute('required', true))
    !!}
</div>