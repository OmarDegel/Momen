    @include('admin.layouts.forms.head', [
        'show_name' => true,
        "name_ar" => $delivery_time->nameLang('ar'),
        "name_en" => $delivery_time->nameLang('en'),
    ])
    
    @include('admin.layouts.forms.fields.select', [
        'select_name' => 'active',
        'select_function' => [false => __('site.not_active'), true => __('site.active')],
        'select_value' => $delivery_time->active ?? null,
        'select_class' => 'select2',
        'select2' => true,
    ])
   
    @include('admin.layouts.forms.fields.select', [
        'select_name' => 'hour_start',
        'select_function' => \App\Helpers\HourHelper::fullDayRange(),
        'select_value' => $delivery_time->hour_start ?? old("hour_start"),
        'select_class' => 'select2',
        'select2' => true,
    ])@include('admin.layouts.forms.fields.select', [
        'select_name' => 'hour_end',
        'select_function' => \App\Helpers\HourHelper::fullDayRange(),
        'select_value' => $delivery_time->hour_end ?? old("hour_end"),
        'select_class' => 'select2',
        'select2' => true,
    ])
    @include('admin.layouts.forms.fields.select', [
        'select_name' => 'type',
        'select_function' => deliveryTimeType(),
        'select_value' => $delivery_time->type ?? old("type"),
        'select_class' => 'select2',
        'select2' => true,
    ])
   
    @include('admin.layouts.forms.footer')
    @include('admin.layouts.forms.close')
    </div>