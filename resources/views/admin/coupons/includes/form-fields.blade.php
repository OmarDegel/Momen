    @include('admin.layouts.forms.head', [
        'show_name' => true,
        'show_content' => true,
        'name_ar' => $coupon?->nameLang('ar') ?? null,
        'name_en' => $coupon?->nameLang('en') ?? null,
        'content_ar' => $coupon?->contentLang('ar') ?? null,
        'content_en' => $coupon?->contentLang('en') ?? null,
    ])
    <div class="row">
        <div class="col-md-6">
            @include('admin.layouts.forms.fields.text', [
                'text_name' => 'code',
                'text_value' => $coupon->code ?? null,
                'label_name' => __('site.code'),
                'label_req' => true,
            ])
        </div>
        <div class="col-md-6">

            @include('admin.layouts.forms.fields.select', [
                'select_name' => 'type',
                'select_function' => ['percentage' => __('site.percentage'), 'fixed' => __('site.fixed')],
                'select_value' => $coupon->type ?? null,
                'select_class' => 'select2',
                'select2' => true,
            ])
        </div>
        <div class="col-md-6">
            @include('admin.layouts.forms.fields.number', [
                'number_name' => 'max_discount',
                'min' => 0,
                'placeholder' => __('site.max_discount'),
                'number_value' => $coupon->max_discount ?? null,
            ])
        </div>
        <div class="col-md-6">
            @include('admin.layouts.forms.fields.number', [
                'number_name' => 'discount',
                'min' => 0,
                'placeholder' => __('site.discount'),
                'number_value' => $coupon->discount ?? null,
            ])

        </div>
        <div class="col-md-6">

            @include('admin.layouts.forms.fields.select', [
                'select_name' => 'active',
                'select_function' => [0 => __('site.not_active'), 1 => __('site.active')],
                'select_value' => $coupon->active ?? null,
                'select_class' => 'select2',
                'select2' => true,
            ])
        </div>
        <div class="col-md-6">

            @include('admin.layouts.forms.fields.number', [
                'number_name' => 'user_limit',
                'min' => 0,
                'placeholder' => __('site.user_limit'),
                'number_value' => $coupon->user_limit ?? null,
            ])
        </div>
        <div class="col-md-6">

            @include('admin.layouts.forms.fields.number', [
                'number_name' => 'use_count',
                'min' => 0,
                'placeholder' => __('site.use_count'),
                'number_value' => $coupon->use_count ?? null,
                'number_class' => 'disabled',
            ])
        </div>
        <div class="col-md-6">

            @include('admin.layouts.forms.fields.date', [
                'date_name' => 'date_start',
                'date_value' => $coupon->date_start ?? null,
            ])
        </div>
        <div class="col-md-6">
            @include('admin.layouts.forms.fields.date', [
                'date_name' => 'date_expire',
                'date_value' => $coupon->date_expire ?? null,
            ])
        </div>
        <div class="col-md-6">
            @include('admin.layouts.forms.fields.number', [
                'number_name' => 'min_order',
                'min' => 0,
                'placeholder' => __('site.min_order'),
                'number_value' => $coupon->min_order ?? null,
            ])
        </div>
        <div class="col-md-6">
            @include('admin.layouts.forms.fields.number', [
                'number_name' => 'order_id',
                'min' => 0,
                'placeholder' => __('site.order_id'),
                'number_value' => $coupon->order_id ?? null,
            ])
        </div>
        <div class="col-md-6">
            @include('admin.layouts.forms.fields.select', [
                'select_name' => 'finish',
                'select_function' => [0 => __('site.not_finish'), 1 => __('site.finish')],
                'select_value' => $coupon->finish ?? null,
                'select_class' => 'select2',
                'select2' => true,
            ])
        </div>

        @include('admin.layouts.forms.footer')
        @include('admin.layouts.forms.close')
    </div>
