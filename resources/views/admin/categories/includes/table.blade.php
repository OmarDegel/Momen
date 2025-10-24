@include('admin.layouts.table.header', [
    'TitleTable' => __('site.categories'),
    'routeToCreate' => route('dashboard.categories.create'),
    'filter' => true,
    "model" => "categories",
])

@include('admin.layouts.table.thead_info', [
    'columns' => [
        'site.name',
        'site.order_id',
        'site.category_parent',
        'site.image',
        'site.status',
        'site.action',
    ],
])

<tbody>
    @if ($categories->count() > 0)
        @each('admin.categories.includes.data', $categories, 'category')
    @else
        @include('admin.layouts.table.empty', [($number = 8)])
    @endif
</tbody>
</table>
@include('admin.layouts.table.footer')
@include('admin.layouts.table.paginate', ['data' => $categories])
