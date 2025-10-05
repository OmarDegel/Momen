@include('admin.layouts.table.header', [
    'TitleTable' => __('site.products'),
    "filter" => true,
    'routeToCreate' => route('dashboard.products.create'),
    "model" => "products",
])

@include('admin.layouts.table.thead_info', [
    'columns' => [
        'site.name',
        'site.code',
        'site.price',
        'site.categories',
        'site.feature',
        'site.returned',
        'site.status',
        'site.action',
    ],
])

<tbody>
    @if ($products->count() > 0)
        @each('admin.products.includes.data', $products, 'product')
    @else
        @include('admin.layouts.table.empty', [($number = 11)])
    @endif
</tbody>
</table>
@include('admin.layouts.table.footer')
@include('admin.layouts.table.paginate', ['data' => $products])
