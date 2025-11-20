<div class="form-group">
    <label>{{ __('Date End') }}</label>
    {!!
    html()
    ->text('date_end', $date_end ?? null)
    ->class($date_class ?? 'form-control datepicker')
    ->attribute('required', $required ?? false)
    !!}
</div>