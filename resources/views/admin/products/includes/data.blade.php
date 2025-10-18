<tr>
    <td class="text-lg-center">{{ $product->nameLang() }}</td>
    <td class="text-lg-center">{{ $product->code }}</td>
    <td class="text-lg-center">{{ $product->price }}</td>
    <td class="text-lg-center">
        @foreach ($product->categories as $category)
            <div class="badge bg-label-success me-1 mb-3">{{ $category->nameLang() }}</div>
        @endforeach
    </td>

    @include('admin.layouts.tables.active', [
        'model' => 'products',
        'item' => $product,
        'param' => 'product',
        'function' => 'feature',
    ])
   
    {{-- returned --}}
    @include('admin.layouts.tables.active', [
        'model' => 'products',
        'item' => $product,
        'param' => 'product',
        'function' => 'is_returned',
    ])
    {{-- status --}}
    @include('admin.layouts.tables.active', [
        'model' => 'products',
        'item' => $product,
        'param' => 'product',
    ])




    {{-- action --}}
    @include('admin.layouts.tables.actions', [
        'model' => 'products',
        'edit' => true,
        'show' => true,
        'delete' => true,
        'item' => $product,
    ])
</tr>

@include('admin.layouts.modals.delete', [
    'id' => $product->id,
    'main_name' => 'dashboard.products',
    'name' => 'product',
    'foreDelete' => $foreDelete ?? false,
])
