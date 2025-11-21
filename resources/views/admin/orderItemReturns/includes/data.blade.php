<tr>
    <td class="text-center">{{ $itemReturn->user?->name_first}} {{ $itemReturn->user?->name_last }}</td>
    <td class="text-center">{{ $itemReturn->user?->phone ?? __('site.null') }}</td>
    <td class="text-center">#{{ $itemReturn->order_id }}</td>
    <td class="text-center">{{ $itemReturn->orderItem?->product?->nameLang() ?? __('site.null') }}</td>
    <td class="text-center">{{ $itemReturn->reason?->nameLang() ?? __('site.null') }}</td>
    <td class="text-center fw-bold">{{ $itemReturn->price_return }}</td>
    @php
    $availableStatuses = collect(App\Helpers\StatusOrderItemsReturnHelper::getAvailableTransitions($itemReturn->status))
    ->mapWithKeys(fn($status) => [$status->value => $status->label()])
    ->toArray();
    @endphp


    <td class="text-lg-center px-5">
        @include('admin.layouts.forms.fields.select', [
        'select_name' => 'status',
        'select_function' => $availableStatuses,
        'select_value' => $itemReturn->status->value,
        'select_class' => 'select2 change-status',
        'select2' => true,
        'select_id' => 'status' . $itemReturn->id,
        ])
    </td>

    <td class="text-lg-center">{{ $itemReturn->created_at->diffForHumans() }}</td>



    {{-- action --}}
    @include('admin.layouts.tables.actions', [
    'model' => 'orderItemReturns',
    'show' => true,
    'item' => $itemReturn,
    ])
</tr>