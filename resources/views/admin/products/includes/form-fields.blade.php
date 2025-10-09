@include('admin.layouts.forms.head', [
'show_name' => true,
'show_content' => true,
'show_image' => true,
'name_ar' => $product?->nameLang('ar') ?? old("name.ar"),
'name_en' => $product?->nameLang('en') ?? old("name.en"),
'content_ar' => $product?->contentLang('ar') ?? old("content.ar"),
'content_en' => $product?->contentLang('en') ?? old("content.en"),
])
<div class="row">

    <div class="col-md-6">
        @include('admin.layouts.forms.fields.select', [
        'select_name' => 'brand_id',
        'select_function' => ['' => __('site.select_option')] + $brands,
        'select_value' => $product->brand_id ?? old("brand_id"),
        'select_class' => 'select2',
        'select2' => true,
        'not_req' => true,

        ])
    </div>

    <div class="col-md-6">
        @include('admin.layouts.forms.fields.select', [
        'select_name' => 'categories',
        'select_function' => $categories,
        'select_value' => $product->categories ?? old("categories"),
        'select_class' => 'select2',
        'select2' => true,
        'label_req' => true,
        'select_id' => 'categories',
        'is_multiple' => true
        ])
    </div>

</div>


<div class="row">

    <div class="col-md-6">
        @include('admin.layouts.forms.fields.number', [
        'number_name' => 'order_max',
        'number_id' => 'order_max',
        'min' => 0,
        'placeholder' => __('site.order_max'),
        'number_value' => $product->order_max ?? old("order_max"),
        'label_req' => true,
        ])

    </div>
    <div class="col-md-6">
        @include('admin.layouts.forms.fields.number', [
        'number_name' => 'order_limit',
        'number_id' => 'order_limit',
        'min' => 0,
        'placeholder' => __('site.order_limit'),
        'number_value' => $product->order_limit ?? old("order_limit"),
        'label_req' => true,
        ])

    </div>


</div>
<div class="row">
    @include('admin.layouts.forms.fields.select', [
    'select_name' => 'size_id',
    'select_function' => ['' => __('site.select_option')] + $sizes ?? null,
    'select_value' => $product->size_id ?? null,
    'select_class' => 'select2',
    'select2' => true,
    'not_req' => true,

    ])
</div>

@include('admin.products.includes.booliens_fields')

@include('admin.products.includes.price_fields')

{{-- @include('admin.products.includes.date_fields') --}}


@include('admin.layouts.forms.fields.multi_dropzone', [
"name" => "images",
])

<div class="form-repeater">
    <div data-repeater-list="children">
        @if (isset($product) && $product->children()->count() > 0)

        @foreach ($product->children as $child)
        @include('admin.products.includes.repeater_item', ['child' => $child])
        @endforeach

        @else

        @include('admin.products.includes.repeater_item', ['child' => null])

        @endif

    </div>

    <button data-repeater-create type="button" class="btn btn-primary mt-3">
        {{ __('site.add') }}
    </button>
</div>


@include('admin.layouts.forms.footer')
@include('admin.layouts.forms.close')
</div>