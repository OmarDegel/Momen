<div class="row">
    @include('admin.layouts.forms.fields.text', [
        'text_name' => 'name',
        'text_value' => $address->name ?? old('name'),
        'label_name' => __('site.name'),
        'label_req' => true,
    ])
    <div class="col-md-6">
        @include('admin.layouts.forms.fields.select', [
            'select_name' => 'user_id',
            'select_function' => $users,
            'select_value' => $address->user->id ?? old('user_id'),
            'select_class' => 'select2',
            'select2' => true,
        ])
    </div>
    <div class="col-md-6">
        @include('admin.layouts.forms.fields.number', [
            'number_name' => 'phone',
            'number_value' => $address->phone ?? old('phone'),
            'label_name' => __('site.phone'),
        ])
    </div>
    <div class="col-md-6">
        @include('admin.layouts.forms.fields.text', [
            'text_name' => 'address',
            'text_value' => $address->address ?? old('address'),
            'label_name' => __('site.address'),
            'label_req' => true,
        ])
    </div>
    <div class="col-md-6">
        @include('admin.layouts.forms.fields.select', [
            'select_name' => 'type',
            'select_function' => collect(\App\Enums\TypeAddressEnum::cases())->mapWithKeys(fn($case) => [$case->value => $case->label()])->toArray(),
            'select_value' => $address->type?->value ?? old('type'),
            'select_class' => 'select2',
            'select2' => true,
        ])
    </div>
    <div class="col-md-6">
        @include('admin.layouts.forms.fields.text', [
            'text_name' => 'building',
            'text_value' => $address->building ?? old('building'),
            'label_name' => __('site.building'),
        ])
    </div>
    <div class="col-md-6">
        @include('admin.layouts.forms.fields.select', [
            'select_name' => 'region_id',
            'select_function' => $regions,
            'select_value' => $address->region->id ?? old('region_id'),
            'select_class' => 'select2',
            'select2' => true,
        ])
    </div>
    <div class="col-md-6">
        @include('admin.layouts.forms.fields.text', [
            'text_name' => 'floor',
            'text_value' => $address->floor ?? old('floor'),
            'label_name' => __('site.floor'),
        ])
    </div>
    <div class="col-md-6">
        @include('admin.layouts.forms.fields.select', [
            'select_name' => 'city_id',
            'select_function' => $cities,
            'select_value' => $address->city->id ?? old('city_id'),
            'select_class' => 'select2',
            'select2' => true,
        ])
    </div>
    <div class="col-md-6">
        @include('admin.layouts.forms.fields.text', [
            'text_name' => 'apartment',
            'text_value' => $address->apartment ?? old('apartment'),
            'label_name' => __('site.apartment'),
        ])
    </div>
    <div class="col-md-6">
        @include('admin.layouts.forms.fields.text', [
            'text_name' => 'longitude',
            'text_value' => $address->longitude ?? old('longitude'),
            'label_name' => __('site.longitude'),
            'label_req' => true,
        ])
    </div>
    <div class="col-md-6">
        @include('admin.layouts.forms.fields.text', [
            'text_name' => 'latitude',
            'text_value' => $address->latitude ?? old('latitude'),
            'label_name' => __('site.latitude'),
            'label_req' => true,
        ])
    </div>
    <div class="col-md-6">
        @include('admin.layouts.forms.fields.text', [
            'text_name' => 'additional_info',
            'text_value' => $address->additional_info ?? old('additional_info'),
            'label_name' => __('site.additional_info'),
        ])
    </div>
    <div class="mt-3">
        @include('admin.layouts.forms.buttons.save', [
            'save' => __('site.send'),
        ])

    </div>
</div>
