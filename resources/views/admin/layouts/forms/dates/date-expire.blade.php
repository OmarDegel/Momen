<div class="form-group">
    <label>{{ __('Date Expire') }}</label>
    {!!
        html()
            ->text('date_expire', $date_expire ?? null)
            ->class($date_class ?? 'form-control datepicker')
            ->attribute('required', $required ?? false)
    !!}
</div>
