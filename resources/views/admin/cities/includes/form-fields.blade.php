    @include('admin.layouts.forms.head', [
        'show_name' => true,
        'name_ar' => $city?->nameLang('ar') ?? null,
        'name_en' => $city?->nameLang('en') ?? null,
    ])
    @include('admin.layouts.forms.fields.number', [
        'number_name' => 'order_id',
        'min' => 0,
        'placeholder' => __('site.order_id'),
        'number_value' => $city->order_id ?? null,
    ])
    @include('admin.layouts.forms.fields.number', [
        'number_name' => 'shipping',
        'min' => 0,
        'placeholder' => __('site.shipping'),
        'number_value' => $city->shipping ?? null,
    ])



    @include('admin.layouts.forms.fields.select', [
        'select_name' => 'active',
        'select_value' => $city->active ?? null,
        'select_class' => 'select2',
        'select2' => true,
    ])


    @include('admin.layouts.forms.footer')
    @include('admin.layouts.forms.close')
    </div>
