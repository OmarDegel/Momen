@php
if (!isset($child) || !is_object($child)) {
$child = null;
}
@endphp

<div data-repeater-item class="row g-3 align-items-end mb-3">

    {{-- Hidden ID --}}
    @include('admin.layouts.forms.hiddens.id', [
    'id' => $child?->id,
    'name' => 'children[][id]'
    ])

    {{-- Size Select --}}
    <div class="col-xl-3 col-lg-4 col-md-6 col-12">
        @include('admin.layouts.forms.fields.select', [
        'select_name' => 'children[][size_id]',
        'select_function' => ['' => __('site.select_option')] + $sizes,
        'select_value' => $child?->size_id,
        'label_req' => true,
        'id' => 'size_id'
        ])
    </div>

    {{-- Colors Select Multiple --}}
    <div class="col-xl-3 col-lg-4 col-md-6 col-12">
        @include('admin.layouts.forms.fields.select', [
        'select_name' => 'children[][color_id]',
        'select_function' => ['' => __('site.select_option')] + $colors,
        'select_value' => $child?->color_id,
        'label_req' => true,
        'id' => 'size_id'
        ])
    </div>
    {{-- Price --}}
    <div class="col-xl-3 col-lg-4 col-md-6 col-12">
        @include('admin.layouts.forms.fields.number', [
        'number_name' => 'children[][price]',
        'min' => 0,
        'placeholder' => __('site.price'),
        'number_value' => $child?->price,
        'label_req' => true,
        ])
    </div>

    {{-- Is Offer --}}
    <div class="col-xl-3 col-lg-4 col-md-6 col-12">
        @include('admin.layouts.forms.fields.select', [
        'select_name' => 'children[][is_offer]',
        'select_function' => ['' => __('site.select_option')] + booleantype(),
        'select_value' => $child?->is_offer,
        "select_id" => "is_offer",
        ])
    </div>

    {{-- Offer Price --}}
    <div class="col-xl-3 col-lg-4 col-md-6 col-12">
        @include('admin.layouts.forms.fields.number', [
        'number_name' => 'children[][offer_price]',
        'min' => 0,
        'placeholder' => __('site.offer_price'),
        'number_value' => $child?->offer_price,
        'not_req' => true,
        ])
    </div>

    {{-- File Upload --}}
    <div class="col-xl-3 col-lg-4 col-md-6 col-12">
        <label for="bs-validation-upload-file" class="form-label">{{ __('site.upload_files') }}</label>
        <input type="file" class="form-control" id="bs-validation-upload-file" multiple name="children[][images][]">
    </div>
    @if($child && $child->images && $child->images->count())
    <div class="mt-2 d-flex flex-wrap gap-2">
        @foreach($child->images as $image)
        <div class="position-relative" style="width:80px; height:80px;">
            <img src="{{ asset($image->image) }}" class="img-thumbnail"
                style="width:100%; height:100%; object-fit:cover;">
            {{-- <button type="button" class="btn btn-sm btn-danger position-absolute top-0 end-0 p-1"
                onclick="removeChildImage('{{ route('admin.product.gallery.delete', $image->id) }}', this)">
                <i class="bx bx-x"></i>
            </button> --}}
        </div>
        @endforeach
    </div>
    @endif
    {{-- Delete Button --}}
    <div class="col-auto d-flex align-items-end">
        <button class="btn btn-danger mt-2" data-repeater-delete type="button">
            {{ __('site.delete') }}
        </button>
    </div>

</div>