@include('admin.layouts.table.header', [
    'TitleTable' => __('site.regions'),
    'routeToCreate' => route('dashboard.regions.create'),
    'filter' => true,
    "model" => "regions",
])

@include('admin.layouts.table.thead_info', [
    'columns' => [
        'site.name',
        'site.shipping',
        'site.order_id',
        "site.city",
        'site.status',
        'site.action',
    ],
])

<tbody>
    @if ($regions->count() > 0)
        @each('admin.regions.includes.data', $regions, 'region')
    @else
        @include('admin.layouts.table.empty', [($number = 8)])
    @endif
</tbody>
</table>
@include('admin.layouts.table.footer')
@include('admin.layouts.table.paginate', ['data' => $regions])
