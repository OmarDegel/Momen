
@include('admin.layouts.table.header', [
    'TitleTable' => __('site.favorites'),
])
@include('admin.layouts.table.thead_info', [
    'columns' => ['site.user', 'site.product','site.status'],
])

<tbody class="table-border-bottom-0">
    @if ($favorites->count() > 0)
        @each('admin.favorites.includes.data', $favorites, 'favorite')
    @else
        @include('admin.layouts.table.empty', [($number = 6)])
    @endif
</tbody>
</table>
@include('admin.layouts.table.footer')
@include('admin.layouts.table.paginate', ['data' => $favorites])
