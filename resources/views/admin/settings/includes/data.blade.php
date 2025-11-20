<!-- Default Wizard -->
<div class="col-12 mb-4">
    <small class="text-light fw-medium"></small>
    <div class="bs-stepper wizard-numbered mt-2">
        @if (!isset($show))
            <div class="bs-stepper-header">
                <div class="step" data-target="#site-details">
                    <button type="button" class="step-trigger">
                        <span class="bs-stepper-circle"><i class=" ti ti-world"></i></span>
                        <span class="bs-stepper-label">
                            <span class="bs-stepper-title">{{ __('site.site_details') }} </span>
                            <span class="bs-stepper-subtitle">{{ __('site.add_site_details') }} </span>
                        </span>
                    </button>
                </div>
                <div class="line">
                    <i class="ti ti-chevron-right"></i>
                </div>
                <div class="step" data-target="#site-links">
                    <button type="button" class="step-trigger">
                        <span class="bs-stepper-circle"><i class="ti ti-link"></i></span>
                        <span class="bs-stepper-label">
                            <span class="bs-stepper-title">{{ __('site.site_links') }} </span>
                            <span class="bs-stepper-subtitle">{{ __('site.add_site_links') }}</span>
                        </span>
                    </button>
                </div>
            </div>
        @endif
        <div class="bs-stepper-content">
            <form onSubmit="return false">
                <!-- site Details -->
                @include('admin.settings.includes.site-details')

                <!-- site-links -->
                @include('admin.settings.includes.site-links')
