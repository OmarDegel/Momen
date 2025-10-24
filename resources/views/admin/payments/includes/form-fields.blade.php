@include('admin.layouts.forms.head', [
'show_name' => true,
'show_content' => true,
'name_ar' => $payment?->nameLang('ar') ?? old("name.ar"),
'name_en' => $payment?->nameLang('en') ?? old("name.en"),
'content_ar' => $payment?->contentLang('ar') ?? old("content.ar"),
'content_en' => $payment?->contentLang('en') ?? old("content.ar"),
])


    @include('admin.layouts.forms.fields.dropzone', [
        'name' => 'image',
    ])
    @include('admin.layouts.forms.fields.number', [
        'number_name' => 'order_id',
        'min' => 0,
        'placeholder' => __('site.order_id'),
        'number_value' => $payment->order_id ?? old("order_id"),
    ])

    @include('admin.layouts.forms.fields.select', [
        'select_name' => 'active',
        'select_function' => [0 => __('site.not_active'), 1 => __('site.active')],
        'select_value' => $payment->active ?? old("active"),
        'select_class' => 'select2',
        'select2' => true,
    ])
    @include('admin.layouts.forms.fields.select', [
        'select_name' => 'type',
        'select_function' => \App\Helpers\PaymentHelper::getPaymentTypes(),
        'select_value' => $payment->type ?? old("type"),
        'select_class' => 'select2',
        'select2' => true,
    ])
    @include('admin.layouts.forms.footer')
    @include('admin.layouts.forms.close')
    </div>