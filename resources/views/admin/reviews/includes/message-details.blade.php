<div class="card mb-4">
    <div class="card-header">
        <h3 class="card-title">@lang('site.review_details')</h3>
    </div>
    <div class="card-body">
        <table class="table table-md">
            <tbody>
                <tr>
                    <th>@lang('site.name')</th>
                    <td>{{ $review->user->name_first }}</td>
                </tr>
                <tr>
                    <th>@lang('site.email')</th>
                    <td>{{ $review->user->email }}</td>
                </tr>
                <tr>
                    <th>@lang('site.phone')</th>
                    <td>{{ $review->user->phone }}</td>
                </tr>
                <tr>
                    <th>@lang('site.body')</th>
                    <td>{{ $review->content }}</td>
                </tr>
                <tr>
                    <th>@lang('site.type')</th>
                    <td>@if($review->reviewable_type == "App\Models\Product") @lang('site.product') @else
                        @lang('site.order') @endif</td>
                </tr>
                @if($review->reviewable_type == "App\Models\Product")
                <tr>
                    <th>@lang('site.product')</th>
                    <td>{{ $review->reviewable?->nameLang() ?? __('site.null') }}</td>
                </tr>
                @else
                <tr>
                    <th>@lang('site.order')</th>
                    <td>{{ $review->reviewable?->id ?? __('site.null') }}</td>
                </tr>
                @endif
                <tr>
                    <th>@lang('site.rate')</th>
                    <td>{{ $review->rating }}</td>
                </tr>
            </tbody>
        </table>
        <div class="d-flex justify-content-end mt-4 gap-2">
            <a href="{{ route('dashboard.reviews.index') }}" class="btn btn-primary">
                {{ __('site.return') }}
            </a>
            <a href="{{ route('dashboard.reviews.edit', $review->id) }}" class="btn btn-primary">
                {{ __('site.edit') }}
            </a>
        </div>

    </div>
</div>