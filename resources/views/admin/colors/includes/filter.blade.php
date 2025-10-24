@include('admin.layouts.modals.filter.header',
['model' => 'colors',
'search'=>true,
'active'=>true,
'sort_by'=>true,
])


{{-- buttons --}}
@include('admin.layouts.modals.filter.buttons', ['model' => 'colors'])

{{-- Footer --}}
@include('admin.layouts.modals.filter.footer')