@include('admin.layouts.table.header', [
    'TitleTable' => __('site.sizes'),
    'routeToCreate' => route('dashboard.sizes.create'),
    'filter' => true,
    "model" => "sizes",
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
    @if ($sizes->count() > 0)
        @each('admin.sizes.includes.data', $sizes, 'size')
    @else
        @include('admin.layouts.table.empty', [($number = 8)])
    @endif
</tbody>
</table>
@include('admin.layouts.table.footer')
@include('admin.layouts.table.paginate', ['data' => $sizes])
