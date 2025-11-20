@include('admin.layouts.modals.filter.header', 
['model' => 'brands',
'search'=>true,
'active'=>true,
'sort_by'=>true,
"trash" => true
])






{{-- buttons --}}
@include('admin.layouts.modals.filter.buttons', ['model' => 'brands'])

{{-- Footer --}}
@include('admin.layouts.modals.filter.footer')
