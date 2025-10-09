@include('admin.layouts.forms.head', [
'show_name' => true,
'show_content' => true,
'show_title' => true,
'name_ar' => $page?->nameLang('ar') ?? old("name.ar"),
'name_en' => $page?->nameLang('en') ?? old("name.en"),
'content_ar' => $page?->contentLang('ar') ?? old("content.ar"),
'content_en' => $page?->contentLang('en') ?? old("content.ar"),
'title_ar' => $page?->titleLang('ar') ?? old("title.ar"),
'title_en' => $page?->titleLang('en') ?? old("title.ar"),
])

<div class="row">
    <div class="col-sm-6">
        @include('admin.layouts.forms.fields.select', [
        'select_name' => 'active',
        'select_value' => $page->active ?? old("active"),
        'select_class' => 'select2',
        'select2' => true,
        ])
    </div>
    <div class="col-sm-6">
        @include('admin.layouts.forms.fields.select', [
        'select_name' => 'feature',
        'select_value' => $page->feature ?? old("feature"),
        'select_class' => 'select2',
        'select2' => true,
        ])
    </div>
    <div class="col-sm-6">
        @include('admin.layouts.forms.fields.select', [
        'select_name' => 'page_type',
        'select_function' => \App\Enums\PageEnum::getPagesTypes(),
        'select_value' => $page->page_type ?? old("page_type"),
        'select_class' => 'select2',
        'select2' => true,
        ])
    </div>
    <div class="col-sm-6">
        @include('admin.layouts.forms.fields.select', [
        'select_name' => 'type',
        'select_function' => ['null'=>__('site.null'), 'static' => __('site.static'), 'dynamic' => __('site.dynamic')],
        'select_value' => $page->type ?? old("type"),
        'select_class' => 'select2',
        'select2' => true,
        ])
    </div>
    <div class="col-sm-6">
        @include('admin.layouts.forms.fields.select', [
        'select_name' => 'product_id',
        'select_function' => ['null'=>__('site.null')]+$products,
        'select_value' => $page->product_id ?? old("product_id"),
        'select_class' => 'select2',
        'select2' => true,
        ])
    </div>
    <div class="col-sm-6">
        @include('admin.layouts.forms.fields.text', [
        'text_name' => 'link',
        'text_value' => $page->link ?? old("link"),
        'label_name' => __('site.link'),
        'not_req' => true,
        ])
    </div>
    <div class="col-sm-6">
        @include('admin.layouts.forms.fields.text', [
        'text_name' => 'video',
        'text_value' => $page->video?? old("video"),
        'label_name' => __('site.video'),
        'not_req' => true,
        ])
    </div>
    @include('admin.layouts.forms.fields.number', [
    'number_name' => 'order_id',
    'number_value' => $page->order_id ?? old("order_id"),
    'min' => 0,
    'placeholder' => __('site.order_id'),
    ])
</div>
@include('admin.layouts.forms.fields.dropzone', [
'name' => 'image',
])
@include('admin.layouts.forms.footer')
@include('admin.layouts.forms.close')
</div>