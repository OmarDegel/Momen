<div id="site-details" class="content">
    <div class="row g-3">
        <div class="col-sm-6">
            @include('admin.layouts.forms.fields.text', [
                'text_name' => 'site_title',
                'text_value' => $site_title ?? null,
                'label_name' => __('site.site_title'),
                'label_req' => true,
            ])
        </div>
        <div class="col-sm-6">
            @include('admin.layouts.forms.fields.text', [
                'text_name' => 'site_phone',
                'text_value' => $site_phone ?? null,
                'label_name' => __('site.site_phone'),
                'label_req' => true,
            ])
        </div>
        <div class="col-sm-6">
            @include('admin.layouts.forms.fields.text', [
                'text_name' => 'site_email',
                'text_value' => $site_email ?? null,
                'label_name' => __('site.site_email'),
                'label_req' => true,
            ])
        </div>
        <div class="col-sm-6">
            @include('admin.layouts.forms.fields.number', [
                'number_name' => 'min_order',
                'min' => 0,
                'placeholder' => __('site.min_order'),
                'number_value' => $min_order ?? null,
            ])
        </div>
        <div class="col-sm-6">
            @include('admin.layouts.forms.fields.text', [
                'text_name' => 'max_order',
                'text_value' => $max_order ?? null,
                'label_name' => __('site.max_order'),
                'label_req' => true,
            ])
        </div>
        {{-- <div class="col-sm-6">
            @include('admin.layouts.forms.fields.select', [
               'select_name' => 'result',
               'select_function' => \App\Helpers\ResultHelper::getResultOptions(),
               'select_value' => $setting->result ?? null,
               'select_class' => 'select2',
               'select2' => true,
           ])

        </div> --}}


        {{-- <div class="col-sm-6">
            @include('admin.layouts.forms.fields.number', [
                'number_name' => 'max_hour_product_in_carts',
                'min' => 1,
                'placeholder' => __('site.max_hour_product_in_carts'),
                'number_value' => $max_hour_product_in_carts ?? null,
            ])
        </div> --}}
        {{-- <div class="col-sm-6">
            @include('admin.layouts.forms.fields.number', [
                'number_name' => 'min_amount_product_notify',
                'min' => 1,
                'placeholder' => __('site.min_amount_product_notify'),
                'number_value' => $min_amount_product_notify ?? null,
            ]) --}}
        {{-- </div> --}}
        <div class="col-sm-6">
            @include('admin.layouts.forms.fields.number', [
                'number_name' => 'delivery_cost',
                'min' => 1,
                'placeholder' => __('site.delivery_cost'),
                'number_value' => $delivery_cost ?? null,
            ])
        </div>
    
        
        <div class="col-sm-6">
            @include('admin.layouts.forms.fields.select', [
                'select_name' => 'site_open',
                'select_function' =>booleanType(),
                'select_value' => $site_open ?? null,
                'select_class' => 'select2',
                'select2' => true,
            ])
        </div>
        <div class="col-sm-12">
            @include('admin.layouts.forms.fields.dropzone', [
                'name' => 'logo_image',
            ])
        </div>
    </div>
</div>
