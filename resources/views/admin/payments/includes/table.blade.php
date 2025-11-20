@include('admin.layouts.table.header', [
    'TitleTable' => __('site.payments'),
    'routeToCreate' => route('dashboard.payments.create'),
    "model" => "payments",
])

@include('admin.layouts.table.thead_info', [
    'columns' => [ 'site.name', /*'site.type' ,*/ 'site.status', 'site.action'],
])

<tbody class="table-border-bottom-0">
    @if ($payments->count() > 0)
        @each('admin.payments.includes.data', $payments, 'payment')
    @else
        @include('admin.layouts.table.empty', [($number = 6)])
    @endif
</tbody>
</table>
@include('admin.layouts.table.footer')
@include('admin.layouts.table.paginate', ['data' => $payments])
