@include('admin.layouts.table.header', [
    'TitleTable' => __('site.activity_logs'),
    'filter' => true,
    "model" => "activity_log",
])

@include('admin.layouts.table.thead_info', [
    'columns' => [ "site.log_name","site.event","site.model", 'site.causer','site.action'],
])

<tbody>
    @if ($logs->count() > 0)
        @each('admin.activity_logs.includes.data', $logs, 'log')
    @else
        @include('admin.layouts.table.empty', [($number = 6)])
    @endif
</tbody>
</table>
@include('admin.layouts.table.footer')
@include('admin.layouts.table.paginate', ['data' => $logs])
