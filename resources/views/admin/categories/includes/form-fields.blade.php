    @include('admin.layouts.forms.head', [
        'show_name' => true,
        'show_content' => true,
        'show_image' => true,
        'name_ar' => $category?->nameLang('ar') ?? null,
        'name_en' => $category?->nameLang('en') ?? null,
        'content_ar' => $category?->contentLang('ar') ?? null,
        'content_en' => $category?->contentLang('en') ?? null,
    ])
    @include('admin.layouts.forms.fields.number', [
        'number_name' => 'order_id',
        'min' => 0,
        'placeholder' => __('site.order_id'),
        'number_value' => $category->order_id ?? null,
    ])


    @include('admin.layouts.forms.fields.select', [
        'select_name' => 'parent_id',
        'select_function' =>
            ['null' => __('site.null')] +
                $parentCategories->mapWithKeys(fn($category) => [$category->id => $category->nameLang()])->toArray() ??
            null,
        'select_value' => $category->parent_id ?? null,
        'select_class' => 'select2',
        'select2' => true,
    ])
    @include('admin.layouts.forms.fields.select', [
        'select_name' => 'active',
        'select_function' => [0 => __('site.not_active'), 1 => __('site.active')],
        'select_value' => $category->active ?? null,
        'select_class' => 'select2',
        'select2' => true,
    ])

    @include('admin.layouts.forms.fields.dropzone', [
        "name" => "image",
    ])
    @include('admin.layouts.forms.footer')
    @include('admin.layouts.forms.close')
    </div>
