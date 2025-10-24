@include('admin.layouts.table.header', [
    'TitleTable' => __('site.reviews'),
    'routeToCreate' => route('dashboard.reviews.create'),
    'filter' => true,
    "model" => "reviews",
])

@include('admin.layouts.table.thead_info', [
    'columns' => [ "site.user","site.product","site.order", 'site.rate',"site.comment", 'site.status', 'site.action'],
])

<tbody>
    @if ($reviews->count() > 0)
        @each('admin.reviews.includes.data', $reviews, 'review')
    @else
        @include('admin.layouts.table.empty', [($number = 6)])
    @endif
</tbody>
</table>
@include('admin.layouts.table.footer')
@include('admin.layouts.table.paginate', ['data' => $reviews])
