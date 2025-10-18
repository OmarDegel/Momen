@include('admin.layouts.table.header', [
    'TitleTable' => __('site.orders'),
    // "create"=>true,
    'filter' => true,
    "model" => "orders",
])

@include('admin.layouts.table.thead_info', [
    'columns' => [
        'site.client',
        'site.phone',
        'site.location',
        'site.address',
        'site.subtotal',
        'site.discount',
        'site.shipping',
        'site.total',
        'site.status',
        'site.date',
        'site.cancel',
        'site.action',
    ],
])

<tbody class="table-border-bottom-0">
    @if ($orders->count() > 0)
        @each('admin.orders.includes.data', $orders, 'order')
    @else
        @include('admin.layouts.table.empty', [($number = 16)])
    @endif
</tbody>
</table>
@include('admin.layouts.table.footer')
@include('admin.layouts.table.paginate', ['data' => $orders])
