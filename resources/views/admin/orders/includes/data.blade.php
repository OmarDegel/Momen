<tr>
    <td class="text-lg-center">{{ $order->user->name }}</td>
    <td class="text-lg-center">{{ $order->user->phone ?? __('site.null') }}</td>
    {{-- location --}}
    <td class="text-lg-center">
        <a href="https://www.google.com/maps?q={{ $order->address->latitude }},{{ $order->address->longitude }}"
            target="_blank">
            <button disabled type="button" class="btn btn-success active-cities waves-effect waves-light">
                <i class="fa-solid fa-location-dot"></i>
            </button>
        </a>
    </td>
    <td class="text-lg-center">{{ $order->address->address ?? __('site.null') }}</td>


    <td class="text-lg-center">{{ $order->price }}</td>
    <td class="text-lg-center">{{ $order->discount }}</td>
    <td class="text-lg-center">{{ $order->shipping() }}</td>
    <td class="text-lg-center">{{ $order->orderTotal() }}</td>
    @php
        $availableStatuses = collect(App\Helpers\StatusOrderHelper::getAvailableTransitions($order->status))
            ->mapWithKeys(fn($status) => [$status->value => $status->label()])
            ->toArray();
    @endphp


    <td class="text-lg-center">
        @include('admin.layouts.forms.fields.select', [
            'select_name' => 'status',
            'select_function' => $availableStatuses,
            'select_value' => $order->status->value,
            'select_class' => 'select2 change-status',
            'select2' => true,
            'select_id' => 'status' . $order->id,
        ])
    </td>

    <td class="text-lg-center">{{ $order->created_at->diffForHumans() }}</td>
    {{-- cancel --}}
    @include('admin.layouts.tables.cancel', [
    "model" => "orders",
    "item" => $order,
    "param" => "order"
    ])



    {{-- action --}}
    @include('admin.layouts.tables.actions', [
        'model' => 'orders',
        'show' => true,
        'item' => $order,
    ])
</tr>
