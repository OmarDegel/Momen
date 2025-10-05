<div class="modal fade" id="addNewAddress" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn-close position-absolute top-0 end-100 m-3" data-bs-dismiss="modal"
                    aria-label="Close"></button>
                <div class="text-center mb-4">
                    <h4 class="mb-2">{{ __('site.filter') }}</h4>
                </div>
                <form action="{{ route('dashboard.'.$model.'.index') }}" method="GET" id="filterForm" class="row g-3">
                    @if(isset($search))
                    {{-- Search by Name --}}
                    <div class="col-md-6">
                        @include('admin.layouts.forms.fields.text', [
                        'text_name' => 'search',
                        'text_value' => request('search') ?? null,
                        'label_name' => __('site.search'),
                        'label_req' => true,
                        'not_req' => true,
                        ])
                    </div>
                    @endif

                    @if(isset($active))
                    {{-- Active --}}
                    <div class="col-md-6">

                        @include('admin.layouts.forms.fields.select', [
                        'select_name' => 'active',
                        'select_function' => ['all' => __('site.all'), '1' => __('site.active'), '0' =>
                        __('site.not_active')],
                        'select_value' => old('active') ?? request('active'),
                        'select_class' => 'select2',
                        'select2' => true,
                        'not_req' => true,
                        ])
                    </div>
                    @endif
                    {{-- Status --}}
                    @if(isset($status))
                    <div class="col-md-6">

                        @include('admin.layouts.forms.fields.select', [
                        'select_name' => 'status',
                        'select_function' => ['all' => __('site.all'), '1' => __('site.active'), '0' =>
                        __('site.not_active')],
                        'select_value' => old('status') ?? request('status'),
                        'select_class' => 'select2',
                        'select2' => true,
                        'not_req' => true,
                        ])
                    </div>
                    @endif

                    @if(isset($trash))
                    {{-- Trash Status --}}
                    <div class="col-md-6">
                        @include('admin.layouts.forms.fields.select', [
                        'select_name' => 'trash',
                        'select_function' => [ '1' => __('site.not_deleted'), '0' =>
                        __('site.deleted'),'all' => __('site.all')],
                        'select_value' => old('trash') ?? request('trash'),
                        'select_class' => 'select2',
                        'select2' => true,
                        'not_req' => true,
                        ])
                    </div>
                    @endif
                    @if(isset($sort_by))
                    {{-- sort by --}}
                    <div class="col-md-6">
                        @include('admin.layouts.forms.fields.select', [
                        'select_name' => 'sort_by',
                        'select_function' => ['null' => __('site.null'),'latest' => __('site.latest'), 'oldest' =>
                        __('site.oldest')],
                        'select_value' => old('sort_by') ?? request('sort_by'),
                        'select_class' => 'select2',
                        'select2' => true,
                        'not_req' => true,
                        ])
                    </div>
                    @endif