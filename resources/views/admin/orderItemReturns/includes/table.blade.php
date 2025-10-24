@include('admin.layouts.table.header', [
'TitleTable' => __('site.orderItemReturns'),
// "create"=>true,
'filter' => true,
"model" => "orderItemReturns",
])

@include('admin.layouts.table.thead_info', [
'columns' => [
'site.client',
'site.phone',
'site.order_id',
'site.product',
'site.reason',
'site.price_return',
'site.status',
'site.date',
'site.action',
],
])

<tbody class="table-border-bottom-0">
    @if ($orderItemReturns->count() > 0)
    @each('admin.orderItemReturns.includes.data', $orderItemReturns, 'itemReturn')
    @else
    @include('admin.layouts.table.empty', [($number = 16)])
    @endif
</tbody>

@include('admin.layouts.table.footer')
@include('admin.layouts.table.paginate', ['data' => $orderItemReturns])