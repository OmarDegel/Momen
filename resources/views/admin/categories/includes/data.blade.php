<tr>
    <td class="text-lg-center">{{ $category->nameLang() }}</td>
    <td class="text-lg-center">{{ $category->order_id ?? 0 }}</td>
    <td class="text-lg-center">{{ $category->parent?->nameLang() ?? __("site.null") }}</td>
    <td class="text-center">
        @if ($category->image)
            <img src="{{ asset($category->image) }}" alt="{{ $category->nameLang() }}" class="rounded-circle"
                width="50" height="50">
        @else
            <img src="{{ asset('images/default.png') }}" alt="{{ $category->nameLang() }}" class="rounded-circle"
                width="50" height="50">
        @endif
    </td>
    {{-- active --}}
    @include('admin.layouts.tables.active', [
        'model' => 'categories',
        'item' => $category,
        'param' => 'category',
    ])

    {{-- action --}}
    @include('admin.layouts.tables.actions', [
        'model' => 'categories',
        'edit' => true,
        'show' => true,
        'delete' => true,
        'item' => $category,
    ])
</tr>

@include('admin.layouts.modals.delete', [
    'id' => $category->id,
    'main_name' => 'dashboard.categories',
    'name' => 'category',
    'foreDelete' => $category->deleted_at ? true : false,
])
