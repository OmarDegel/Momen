@include('admin.layouts.modals.filter.header',
['model' => 'activity_logs',
'active'=>true,
'sort_by'=>true,
"trash" => true
])




{{-- buttons --}}
@include('admin.layouts.modals.filter.buttons', ['model' => 'regions'])

{{-- Footer --}}
@include('admin.layouts.modals.filter.footer')