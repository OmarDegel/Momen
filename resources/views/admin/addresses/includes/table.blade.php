@include('admin.layouts.table.header', [
    'TitleTable' => __('site.addresses'),
    'routeToCreate' => route('dashboard.addresses.create'),
    "model" => "addresses",
])

@include('admin.layouts.table.thead_info', [
    'columns' => [ 'site.client',"site.city","site.region",'site.address',"site.location", 'site.action'],
])

<tbody>
    @if ($addresses->count() > 0)
        @each('admin.addresses.includes.data', $addresses, 'address')
    @else
        @include('admin.layouts.table.empty', [($number = 7)])
    @endif
</tbody>
</table>
@include('admin.layouts.table.footer')
@include('admin.layouts.table.paginate', ['data' => $addresses])
