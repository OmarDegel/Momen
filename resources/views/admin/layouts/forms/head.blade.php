<!-- Default Wizard -->
<div class="col-12 mb-4">
    <small class="text-light fw-medium"></small>
    <div class="bs-stepper wizard-numbered mt-2">
        @if(!isset($show))
        <div class="bs-stepper-header">
            <div class="step" data-target="#english-details">
                <button type="button" class="step-trigger">
                    <span class="bs-stepper-circle">{{ __('site.en') }}</span>
                    <span class="bs-stepper-label">
                        <span class="bs-stepper-title">{{ __('site.english_details') }} </span>
                        <span class="bs-stepper-subtitle">{{ __('site.add_english_details') }} </span>
                    </span>
                </button>
            </div>
            <div class="line">
                <i class="ti ti-chevron-right"></i>
            </div>
            <div class="step" data-target="#arabic-details">
                <button type="button" class="step-trigger">
                    <span class="bs-stepper-circle">{{ __('site.ar') }}</span>
                    <span class="bs-stepper-label">
                        <span class="bs-stepper-title">{{ __('site.arabic_details') }} </span>
                        <span class="bs-stepper-subtitle">{{ __('site.add_arabic_details') }}</span>
                    </span>
                </button>
            </div>
        </div>
        @endif
        <div class="bs-stepper-content">
            <form onSubmit="return false">
                <!-- english Details -->
                <div id="english-details" class="content">
                    <div class="row g-3">
                        @if($show_name ?? false)
                        <div class="col-sm-12">
                            @include('admin.layouts.forms.fields.text', [
                            'text_name' => 'name[en]',
                            'text_value' => $name_en ?? null,
                            'label_name' => __("site.english_name"),
                            'label_req' => true])
                        </div>
                        @endif
                        @if($show_title ?? false)
                        <div class="col-sm-12">
                            @include('admin.layouts.forms.fields.text', [
                            'text_name' => 'title[en]',
                            'text_value' => $name_en ?? null,
                            'label_name' => __('site.english_title'),
                            'not_req' => true,
                            ])
                        </div>
                        @endif
                        @if($show_content ?? false)
                        <div class="col-sm-12">
                            @include('admin.layouts.forms.fields.textarea', [
                            'text_name' => 'description[en]',
                            'text_value' => $content_en ?? null,
                            'label_name' => __('site.english_content'),
                            'not_req' => true,
                            'text_id' => 'my-textarea'])
                        </div>
                        @endif

                        @if($show_address ?? false)
                        <div class="col-sm-12">
                            @include('admin.layouts.forms.fields.textarea', [
                            'text_name' => 'address_en',
                            'text_value' => $address_en ?? null,
                            'label_name' => __('site.english_address'),
                            'not_req' => true,
                            'text_id' => 'my-textarea',])
                        </div>
                        @endif



                    </div>
                </div>

                <!-- arabic-details -->
                <div id="arabic-details" class="content">
                    <div class="row g-3">
                        @if($show_name ?? false)
                        <div class="col-sm-12">
                            @include('admin.layouts.forms.fields.text', [
                            'text_name' => 'name[ar]',
                            'text_value' => $name_ar ?? null,
                            'label_name' => __("site.arabic_name"),
                            'label_req' => true])
                        </div>
                        @endif
                        @if($show_title ?? false)
                        <div class="col-sm-12">
                            @include('admin.layouts.forms.fields.text', [
                            'text_name' => 'title[ar]',
                            'text_value' => $name_ar ?? null,
                            'label_name' => __('site.arabic_title'),
                            'not_req' => true,
                            ])
                        </div>
                        @endif
                        @if($show_content ?? false)
                        <div class="col-sm-12">
                            @include('admin.layouts.forms.fields.textarea', [
                            'text_name' => 'description[ar]',
                            'text_value' => $content_ar ?? null,
                            'label_name' => __('site.arabic_content'),
                            'not_req' => true,
                            'text_id' => 'my-textarea'])
                        </div>
                        @endif
                        @if($show_address ?? false)
                        <div class="col-sm-12">
                            @include('admin.layouts.forms.fields.textarea', [
                            'text_name' => 'address_ar',
                            'text_value' => $address_ar ?? null,
                            'label_name' => __('site.arabic_address'),
                            'not_req' => true,
                            'text_id' => 'my-textarea',
                            ])
                        </div>
                        @endif
                    </div>

                </div>
