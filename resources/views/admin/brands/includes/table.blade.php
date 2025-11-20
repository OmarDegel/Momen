@include('admin.layouts.table.header', [
    'TitleTable' => __('site.brands'),
    'routeToCreate' => route('dashboard.brands.create'),
    'filter' => true,
    "model" => "brands",
])

@include('admin.layouts.table.thead_info', [
    'columns' => [
        'site.name',
        'site.order_id',
        'site.image',
        'site.status',
        'site.action',
    ],
])

<tbody>
    @if ($brands->count() > 0)
        @each('admin.brands.includes.data', $brands, 'brand')
    @else
        @include('admin.layouts.table.empty', [($number = 8)])
    @endif
</tbody>
</table>
@include('admin.layouts.table.footer')
@include('admin.layouts.table.paginate', ['data' => $brands])
