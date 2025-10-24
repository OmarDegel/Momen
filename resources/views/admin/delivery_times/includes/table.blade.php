@include('admin.layouts.table.header', [
    'TitleTable' => __('site.delivery_times'),
    'routeToCreate' => route('dashboard.delivery_times.create'),
    "model" => "delivery_times",
])

@include('admin.layouts.table.thead_info', [
    'columns' => [ 'site.name', 'site.hours', "site.status",'site.action'],
])

<tbody>
    @if ($delivery_times->count() > 0)
        @each('admin.delivery_times.includes.data', $delivery_times, 'delivery_time')
    @else
        @include('admin.layouts.table.empty', [($number = 5)])
    @endif
</tbody>
</table>
@include('admin.layouts.table.footer')
@include('admin.layouts.table.paginate', ['data' => $delivery_times])
