<div class="row">
    <div class="col-md-6">
        @include('admin.layouts.forms.fields.number', [
        'number_name' => 'price',
        'min' => 0,
        'placeholder' => __('site.price'),
        'number_value' => $product->price ?? null,
        'label_req' => true,
        ])
    </div>
    <div class="col-md-6">
        @include('admin.layouts.forms.fields.number', [
        'number_name' => 'shipping',
        'min' => 0,
        'placeholder' => __('site.shipping'),
        "number_id" => "shipping",
        'number_value' => $product->shipping ?? null,
        'not_req' => true,

        ])
    </div>

</div>
<div class="row">
    <div class="col-md-6">
        @include('admin.layouts.forms.fields.number', [
        'number_name' => 'offer_price',
        'min' => 0,
        'placeholder' => __('site.offer_price'),
        'number_value' => $product->offer_price ?? null,
        'not_req' => true,

        ])
    </div>



    <div class="col-md-6">
         @include('admin.layouts.forms.fields.text', [
                'text_name' => 'code',
                'text_value' =>  $product->code ?? null,
                'label_name' => __('site.code'),
                'label_req' => true,
        ])
       
    </div>
</div>