@include('admin.layouts.modals.filter.header', 
['model' => 'categories',
'search'=>true,
'active'=>true,
'sort_by'=>true,
"trash" => true
])





{{-- Parent --}}
<div class="col-md-6">

@include('admin.layouts.forms.fields.select', [
    'select_name' => 'parent_id',
    'select_function' =>
        ["all"=>__('site.all')] +
            $parentCategories->mapWithKeys(fn($category) => [$category->id => $category->nameLang()])->toArray() ??
        null,
    'select_value' =>  request('parent_id'),
    'select_class' => 'select2',
    'select2' => true,
    'not_req' => true,
])

</div>
{{-- buttons --}}
@include('admin.layouts.modals.filter.buttons', ['model' => 'categories'])

{{-- Footer --}}
@include('admin.layouts.modals.filter.footer')
