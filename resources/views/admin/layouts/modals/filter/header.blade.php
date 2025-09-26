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