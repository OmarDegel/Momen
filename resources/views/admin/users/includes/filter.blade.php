@include('admin.layouts.modals.filter.header',
['model' => 'users',
'search'=>true,
'active'=>true,
'sort_by'=>true,
"trash" => true
])

<div class="col-md-6">

    @include('admin.layouts.forms.fields.select', [
    'select_name' => 'type',
    'select_function' => ['all' => __('site.all')]+ \App\Helpers\UserHelper::userType(),
    'select_value' => old('type') ?? request('type'),
    'select_class' => 'select2',
    'select2' => true,
    'not_req' => true,
    ])
</div>
<div class="col-md-6">

    @include('admin.layouts.forms.fields.select', [
    'select_name' => 'role_id',
    'select_function' => ['all' => __('site.all')]+ $roles,
    'select_value' => old('role_id') ?? request('role_id'),
    'select_class' => 'select2',
    'select2' => true,
    'not_req' => true,
    ])
</div>
<div class="col-md-6">
    @include('admin.layouts.forms.fields.text', [
    'text_name' => 'email',
    'text_value' => request('email') ?? null,
    'label_name' => __('site.email'),
    'label_req' => true,
    'not_req' => true,
    ])
</div>
<div class="col-md-6">
    @include('admin.layouts.forms.fields.text', [
    'text_name' => 'phone',
    'text_value' => request('phone') ?? null,
    'label_name' => __('site.phone'),
    'label_req' => true,
    'not_req' => true,
    ])
</div>

{{-- buttons --}}
@include('admin.layouts.modals.filter.buttons', ['model' => 'sizes'])

{{-- Footer --}}
@include('admin.layouts.modals.filter.footer')