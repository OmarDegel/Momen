    @include('admin.layouts.forms.head', [
        'show_name' => true,
        'show_content' => true,
        'name_ar' =>old('name[ar]') ?? null,
        'name_en' => old('name[en]') ?? null,
        'content_en' => old('description[en]') ?? null,
        'content_ar' => old('description[ar]') ?? null,
    ])


    @include('admin.layouts.forms.fields.select', [
        'select_name' => 'user_id',
        'select_function' => $users,
        'select_value' =>  old('user_id') ?? null,
        'select_class' => 'select2',
        'select2' => true,
    ])
    @include('admin.layouts.forms.fields.select', [
        'select_name' => 'type',
        'select_function' => $types,
        'select_value' =>  old('type') ?? null,
        'select_class' => 'select2',
        'select2' => true,
    ])
    @include('admin.layouts.forms.fields.select', [
        'select_name' => 'device',
        'select_function' => $devices,
        'select_value' =>  old('device') ?? null,
        'select_class' => 'select2',
        'select2' => true,
    ])

    @include('admin.layouts.forms.footer')
    @include('admin.layouts.forms.close')
    </div>
