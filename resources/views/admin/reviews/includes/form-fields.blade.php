@include('admin.layouts.forms.head', [
'show' => true,
])
@include('admin.layouts.forms.fields.hidden', [
'hidden' => 'user_id',
'hidden_value' => auth()->user()->id,
])

@include('admin.layouts.forms.fields.select', [
'select_name' => 'product_id',
'select_function' => ['null' => __('site.null')] + $products,
'select_value' => $review->reviewable_id ?? null,
'select_class' => 'select2',
'select2' => true,
'select_id' => 'product_id',
])
@include('admin.layouts.forms.fields.select', [
'select_name' => 'rating',
'select_function' => [ 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5],
'select_value' => $review->rating ?? null,
'select_class' => 'select2',
'select2' => true,
])
@include('admin.layouts.forms.fields.select', [
'select_name' => 'active',
'select_function' => [0 => __('site.not_active'), 1 => __('site.active')],
'select_value' => $region->active ?? null,
'select_class' => 'select2',
'select2' => true,
])
@include('admin.layouts.forms.fields.text', [
'text_name' => 'comment',
'text_value' => $review->comment ?? null,
'label_name' => __('site.comment'),
'not_req' => true,
'text_id' => 'comment',
])
@include('admin.layouts.forms.footer')
@include('admin.layouts.forms.close')
</div>