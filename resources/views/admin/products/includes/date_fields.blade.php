<div class="row">
    <div class="col-md-6">
        @include('admin.layouts.forms.fields.date', [
        'date_name' => 'date_start',
        'date_value' => old('date_start', $product->date_start ?? null),
        'placeholder' => 'YYYY-MM-DD HH:MM',
        'date_id' => 'flatpickr-datetime-start',
        'date_class' => ' flatpickr-datetime',
        'label_name' => __('site.date_start'),
        'not_req' => true
        ])
    </div>
    <div class="col-md-6">
        @include('admin.layouts.forms.fields.date', [
        'date_name' => 'date_expire',
        'date_value' => old('date_expire', $product->date_expire ?? null),
        'placeholder' => 'YYYY-MM-DD HH:MM',
        'date_id' => 'flatpickr-datetime-end',
        'date_class' => ' flatpickr-datetime',
        'label_name' => __('site.date_expire'),
        'not_req' => true
        ])
    </div>
</div>
