@include('admin.layouts.modals.filter.header', 
['model' => 'sizes',
'search'=>true,
'active'=>true,
'sort_by'=>true,
"trash" => true
])




{{-- buttons --}}
@include('admin.layouts.modals.filter.buttons', ['model' => 'sizes'])

{{-- Footer --}}
@include('admin.layouts.modals.filter.footer')
