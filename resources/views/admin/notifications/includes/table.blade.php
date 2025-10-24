@include('admin.layouts.table.header', [
    'TitleTable' => __('site.notifications'),
    'routeToCreate' => route('dashboard.notifications.create'),
    "model" => "notifications",
    'filter' => true,
    'deleteAll' => true
])

@include('admin.layouts.table.thead_info', [
    'columns' => ['site.user', 'site.email', 'site.title', 'site.message', 'site.date', 'site.read_at', 'site.action'],
])

<tbody class="table-border-bottom-0">
    @if ($notifications->count() > 0)
        @each('admin.notifications.includes.data', $notifications, 'notification')
    @else
        @include('admin.layouts.table.empty', [($number = 6)])
    @endif
</tbody>
</table>
@include('admin.layouts.table.footer')
@include('admin.layouts.table.paginate', ['data' => $notifications])
