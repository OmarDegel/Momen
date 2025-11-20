@include('admin.layouts.table.header', [
    'TitleTable' => __('site.coupons'),
    'routeToCreate' => route('dashboard.coupons.create'),
    "model" => "coupons",
])

@include('admin.layouts.table.thead_info', [
    'columns' => [ 'site.name', 'site.code', 'site.type', 'site.discount', 'site.max_discount', 'site.min_order', 'site.date', 'site.status', 'site.action'],
])

<tbody class="table-border-bottom-0">
    @if ($coupons->count() > 0)
        @each('admin.coupons.includes.data', $coupons, 'coupon')
    @else
        @include('admin.layouts.table.empty', [($number = 9)])
    @endif
</tbody>
</table>
@include('admin.layouts.table.footer')
@include('admin.layouts.table.paginate', ['data' => $coupons])
