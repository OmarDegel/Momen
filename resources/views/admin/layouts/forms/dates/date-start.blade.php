<div class="form-group">
    <label>{{ __('Date Start') }}</label>
    {!!
        html()
            ->text('date_start', $date_start ?? null)
            ->class($date_class ?? 'form-control datepicker')
            ->attribute('required', $required ?? false)
    !!}
</div>
