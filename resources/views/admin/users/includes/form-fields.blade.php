@include('admin.layouts.forms.head', ['show' => true])
    <input type="hidden" name="id" value="{{ $user->id ?? null }}">
    <div class="row">
        <div class="col-md-6">
            @include('admin.layouts.forms.fields.text', [
                'text_name' => 'name_first',
                'text_value' => $user->name_first ?? null,
                'label_name' => __('site.first_name'),
                'label_req' => true,
            ])
        </div>
        <div class="col-md-6">
            @include('admin.layouts.forms.fields.text', [
                'text_name' => 'name_last',
                'text_value' => $user->name_last ?? null,
                'label_name' => __('site.last_name'),
                'label_req' => true,
            ])
        </div>
        <div class="col-md-6">
            @include('admin.layouts.forms.users.email', ['email' => $user->email ?? null])
        </div>
        <div class="col-md-6">
            @include('admin.layouts.forms.users.phone', ['phone' => $user->phone ?? null])
        </div>
        <div class="col-md-6">
            @include('admin.layouts.forms.users.password', ['new' => 0])
        </div>
        <div class="col-md-6">
            @include('admin.layouts.forms.users.password-confirm', ['new' => 0])
        </div>
        <div class="col-md-6">
            @include('admin.layouts.forms.fields.select', [
                'select_name' => 'active',
                'select_function' => [0 => __('site.not_active'), 1 => __('site.active')],
                'select_value' => $user->active ?? null,
                'select_class' => 'select2',
                'select2' => true,
            ])
        </div>
        <div class="col-md-6">
            @include('admin.layouts.forms.fields.select', [
                'select_name' => 'lang',
                'select_function' => ['en' => __('site.english'), 'ar' => __('site.arabic')],
                'select_value' => $user->lang ?? null,
                'select_class' => 'select2',
                'select2' => true,
            ])
        </div>
    </div>
    <div class="mt-1">
        @include('admin.layouts.forms.users.user-type-admin', ['type' => $user->type ?? null])
    </div>
    <div class="mt-1">
        @include('admin.layouts.forms.users.role', ['roles' => $roles, 'userRoles' => $userRoles ?? null])
    </div>
    @include('admin.layouts.forms.fields.select', [
        'select_name' => 'vip',
        'select_function' => [0 => __('site.no'), 1 => __('site.yes')],
        'select_value' => $user->vip ?? null,
        'select_class' => 'select2',
        'select2' => true,
    ])
    @include('admin.layouts.forms.fields.select', [
        'select_name' => 'is_notify',
        'select_function' => [0 => __('site.no'), 1 => __('site.yes')],
        'select_value' => $user->is_notify ?? null,
        'select_class' => 'select2',
        'select2' => true,
    ])
    @include('admin.layouts.forms.fields.dropzone', [
        "name" => "image",
    ])

    @include('admin.layouts.forms.footer')
    @include('admin.layouts.forms.close')
    </div>