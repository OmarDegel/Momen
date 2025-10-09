@include('admin.layouts.table.header', [
    'TitleTable' => __('site.pages'),
    'routeToCreate' => route('dashboard.pages.create'),
    "model" => "pages",
    'filter' => true
])

@include('admin.layouts.table.thead_info', [
    'columns' => ['site.name', 'site.type','site.order', 'site.image', 'site.status', 'site.action'],
])

<tbody class="table-border-bottom-0">
    @if ($pages->count() > 0)
        @each('admin.pages.includes.data', $pages, 'page')
    @else
        @include('admin.layouts.table.empty', [($number = 6)])
    @endif
</tbody>
</table>
@include('admin.layouts.table.footer')
@include('admin.layouts.table.paginate', ['data' => $pages])
