<tr>
    <td class="text-lg-center">{{ $city->nameLang() }}</td>
    <td class="text-lg-center">{{ $city->shipping }}</td>
    <td class="text-lg-center">{{ $city->order_id ?? 0 }}</td>

    {{-- active --}}
    @include('admin.layouts.tables.active', [
        'model' => 'cities',
        'item' => $city,
        'param' => 'city',
    ])

    {{-- action --}}
    @include('admin.layouts.tables.actions', [
        'model' => 'cities',
        'edit' => true,
        'show' => true,
        'delete' => true,
        'item' => $city,
    ])
</tr>

@include('admin.layouts.modals.delete', [
    'id' => $city->id,
    'main_name' => 'dashboard.cities',
    'name' => 'city',
    'foreDelete' => $city->deleted_at ? true : false,
])
