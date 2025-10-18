<tr>
    <td class="text-lg-center">{{ $color->nameLang() }}</td>
    <td class="text-lg-center">{{ $color->order_id ?? 0 }}</td>


    {{-- active --}}
    @include('admin.layouts.tables.active', [
        'model' => 'colors',
        'item' => $color,
        'param' => 'color',
    ])

    {{-- action --}}
    @include('admin.layouts.tables.actions', [
        'model' => 'colors',
        'edit' => true,
        'show' => true,
        'item' => $color,
    ])
</tr>

