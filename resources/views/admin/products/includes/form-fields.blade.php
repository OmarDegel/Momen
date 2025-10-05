@include('admin.layouts.forms.head', [
'show_name' => true,
'show_content' => true,
'show_image' => true,
'name_ar' => $product?->nameLang('ar') ?? null,
'name_en' => $product?->nameLang('en') ?? null,
'content_ar' => $product?->contentLang('ar') ?? null,
'content_en' => $product?->contentLang('en') ?? null,
])
<div class="row">

    <div class="col-md-6">
        @include('admin.layouts.forms.fields.select', [
        'select_name' => 'brand_id',
        'select_function' => ['' => __('site.select_option')] + $brands->mapWithKeys(fn($brand) => [$brand->id =>
        $brand->nameLang()])->toArray() ?? null,
        'select_value' => $product->brand_id ?? null,
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

    <div class="col-md-4">
        @include('admin.layouts.forms.fields.number', [
        'number_name' => 'order_max',
        'number_id' => 'order_max',
        'min' => 0,
        'placeholder' => __('site.order_max'),
        'number_value' => $product->order_max ?? null,
        'label_req' => true,
        ])

    </div>
    <div class="col-md-4">
        @include('admin.layouts.forms.fields.number', [
        'number_name' => 'skip',
        'number_id' => 'skip',
        'min' => 0,
        'placeholder' => __('site.skip'),
        'number_value' => $product->skip ?? null,
        'label_req' => true,
        ])

    </div>
    <div class="col-md-4">
        @include('admin.layouts.forms.fields.number', [
        'number_name' => 'start',
        'number_id' => 'start',
        'min' => 0,
        'placeholder' => __('site.start'),
        'number_value' => $product->start ?? null,
        'label_req' => true,
        ])

    </div>

</div>
<div class="row">
    @include('admin.layouts.forms.fields.select', [
    'select_name' => 'size_id',
    'select_function' => ['' => __('site.select_option')] + $sizes->mapWithKeys(fn($size) => [$size->id =>
    $size->nameLang()])->toArray() ?? null,
    'select_value' => $product->size_id ?? null,
    'select_class' => 'select2',
    'select2' => true,
    'not_req' => true,

    ])
</div>

@include('admin.products.includes.booliens_fields')

@include('admin.products.includes.price_fields')

@include('admin.products.includes.date_fields')


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