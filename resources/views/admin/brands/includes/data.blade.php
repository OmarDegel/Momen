<tr>
    <td class="text-lg-center">{{ $brand->nameLang() }}</td>
    <td class="text-lg-center">{{ $brand->order_id ?? 0 }}</td>
    <td class="text-center">
        @if ($brand->image)
            <img src="{{ asset($brand->image) }}" alt="{{ $brand->nameLang() }}" class="rounded-circle"
                width="50" height="50">
        @else
            <img src="{{ asset('images/default.png') }}" alt="{{ $brand->nameLang() }}" class="rounded-circle"
                width="50" height="50">
        @endif
    </td>
    {{-- active --}}
    @include('admin.layouts.tables.active', [
        'model' => 'brands',
        'item' => $brand,
        'param' => 'brand',
    ])

    {{-- action --}}
    @include('admin.layouts.tables.actions', [
        'model' => 'brands',
        'edit' => true,
        'show' => true,
        'delete' => true,
        'item' => $brand,
    ])
</tr>

@include('admin.layouts.modals.delete', [
    'id' => $brand->id,
    'main_name' => 'dashboard.brands',
    'name' => 'brand',
    'foreDelete' => $brand->deleted_at ? true : false,
])
