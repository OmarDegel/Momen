<div class="row">
    <div class="col-md-6">
        @include('admin.layouts.forms.fields.number', [
        'number_name' => 'order_id',
        'min' => 0,
        'not_req'=> true,
        'placeholder' => __('site.order_id'),
        'number_value' => $product->order_id ?? null,

        ])
    </div>
    <div class="col-md-6">
        @include('admin.layouts.forms.fields.select', [
        'select_name' => 'active',
        'select_function' =>statusType(),
        'select_value' => $product->active ?? null,
        'select_class' => 'select2',
        'select2' => true,
        ])
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        @include('admin.layouts.forms.fields.select', [
        'select_name' => 'feature',
        'select_function' => booleantype(),
        'select_value' => $product->feature ?? null,
        'select_class' => 'select2',
        'select2' => true,
        ])
    </div>
    <div class="col-md-6">
        @include('admin.layouts.forms.fields.select', [
        'select_name' => 'is_returned',
        'select_function' => booleantype(),
        'select_value' => $product->is_returned ?? null,
        'select_class' => 'select2',
        'select2' => true,
        ])
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        @include('admin.layouts.forms.fields.select', [
        'select_name' => 'is_stock',
        'select_function' => booleantype(),

        'select_value' => $product->is_stock ?? null,
        'select_class' => 'select2',
        'select2' => true,
        ])
    </div>

    <div class="col-md-6">
        @include('admin.layouts.forms.fields.select', [
        'select_name' => 'is_new',
        'select_function' => booleantype(),

        'select_value' => $product->is_new ?? null,
        'select_class' => 'select2',
        'select2' => true,
        ])
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        @include('admin.layouts.forms.fields.select', [
        'select_name' => 'is_special',
        'select_function' => booleantype(),

        'select_value' => $product->is_special ?? null,
        'select_class' => 'select2',
        'select2' => true,
        ])
    </div>
    <div class="col-md-6">
        @include('admin.layouts.forms.fields.select', [
        'select_name' => 'is_filter',
        'select_function' => booleantype(),

        'select_value' => $product->is_filter ?? null,
        'select_class' => 'select2',
        'select2' => true,
        ])
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        @include('admin.layouts.forms.fields.select', [
        'select_name' => 'is_sale',
        'select_function' => booleantype(),

        'select_value' => $product->is_sale ?? null,
        'select_class' => 'select2',
        'select2' => true,
        ])
    </div>
    <div class="col-md-6">
        @include('admin.layouts.forms.fields.select', [
        'select_name' => 'is_late',
        'select_function' => booleantype(),

        'select_value' => $product->is_late ?? null,
        'select_class' => 'select2',
        'select2' => true,
        ])
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        @include('admin.layouts.forms.fields.select', [
        'select_name' => 'is_offer',
        'select_function' => booleantype(),

        'select_value' => $product->is_offer ?? null,
        'select_class' => 'select2',
        'select2' => true,
        ])
    </div>

    <div class="col-md-6">
        @include('admin.layouts.forms.fields.select', [
        'select_name' => 'is_shipping_free',
        'select_function' => booleantype(),
        "select_id" => 'is_shipping_free',
        'select_value' => $product->is_shipping_free ?? null,
        'select_class' => 'select2',
        'select2' => true,
        ])
    </div>
</div>
