@include('admin.layouts.modals.filter.header',
['model' => 'pages',
'search'=>true,
'active'=>true,
'sort_by'=>true,
"trash" => true
])

<div class="col-md-6">
    @include('admin.layouts.forms.fields.select', [
    'select_name' => 'product_id',
    'select_function' =>['all'=>__('site.all') ]+ $products,
    'select_value' => old('product_id') ?? request('product_id'),
    'select_class' => 'select2',
    'select2' => true,
    'not_req' => true,
    ])
</div>
<div class="col-md-6">
    @include('admin.layouts.forms.fields.select', [
    'select_name' => 'type',
    'select_function' => ['all'=>__('site.all'), 'static' => __('site.static'), 'dynamic' => __('site.dynamic')],
    'select_value' => old('type') ?? request('type'),
    'select_class' => 'select2',
    'select2' => true,
    'not_req' => true,
    ])
</div>
<div class="col-md-6">
    @include('admin.layouts.forms.fields.select', [
    'select_name' => 'page_type',
    'select_function' => ['all'=>__('site.all')] + \App\Enums\PageEnum::getPagesTypes(),
    'select_value' => old('page_type') ?? request('page_type'),
    'select_class' => 'select2',
    'select2' => true,
    'not_req' => true,
    ])
</div>
<div class="col-md-6">
    @include('admin.layouts.forms.fields.select', [
    'select_name' => 'feature',
    'select_function' => ['all' => __('site.all'), '1' => __('site.active'), '0' =>
    __('site.not_active')],
    'select_value' => old('feature') ?? request('feature'),
    'select_class' => 'select2',
    'select2' => true,
    'not_req' => true,
    ])
</div>


{{-- buttons --}}
@include('admin.layouts.modals.filter.buttons')

{{-- Footer --}}
@include('admin.layouts.modals.filter.footer')