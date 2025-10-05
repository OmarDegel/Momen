<tr>
    <td class="text-lg-center">{{ $review->user->name_first }}</td>
    <td class="text-lg-center">
        {{ $review->reviewable?->nameLang() ?? __('site.null') }}
    </td>
    <td class="text-lg-center">{{ $review->order->id ?? __('site.null') }}</td>
    <td class="text-lg-center">{{ $review->rating }}</td>
    <td class="text-lg-center">{{ $review->comment }}</td>
    {{-- active --}}

    @include('admin.layouts.tables.active', [
        'model' => 'reviews',
        'item' => $review,
        'param' => 'review',
    ])
    @include('admin.layouts.tables.actions', [
        'model' => 'reviews',
        'edit' => true,
        'show' => true,
        'delete' => true,
        'item' => $review,
    ])

</tr>

@include('admin.layouts.modals.delete', [
    'id' => $review->id,
    'main_name' => 'dashboard.reviews',
    'name' => 'review',
    'foreDelete' => $foreDelete ?? false,
])
