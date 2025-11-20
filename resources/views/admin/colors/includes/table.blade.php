@include('admin.layouts.table.header', [
    'TitleTable' => __('site.colors'),
    'routeToCreate' => route('dashboard.colors.create'),
    'filter' => true,
    "model" => "colors",
])

@include('admin.layouts.table.thead_info', [
    'columns' => [
        'site.name',
        'site.order_id',
        'site.status',
        'site.action',
    ],
])

<tbody>
    @if ($colors->count() > 0)
        @each('admin.colors.includes.data', $colors, 'color')
    @else
        @include('admin.layouts.table.empty', [($number = 8)])
    @endif
</tbody>
</table>
@include('admin.layouts.table.footer')
@include('admin.layouts.table.paginate', ['data' => $colors])
