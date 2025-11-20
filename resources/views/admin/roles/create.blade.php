@extends('admin.layouts.app')
@section('title', __('site.stores'))

@section('content')
@include("admin.layouts.messages.displayErrors")
@include('admin.layouts.forms.create', [
'form_method' => 'POST',
'form_class' => 'form-control',
'form_status' => 'store',
'table' => 'dashboard.roles',
'enctype' => false
])
@include('admin.layouts.forms.head',["show"=>true])
<div class="col-sm-12 mt-3">
    @include('admin.layouts.forms.fields.text', [
    'text_name' => 'name',
    'text_value' => null,
    'label_name' => __("site.name"),
    'label_req' => true])
</div>
<div class="col-sm-12 mt-2">
    @include('admin.layouts.forms.fields.text', [
    'text_name' => 'display_name',
    'text_value' => null,
    'label_name' => __("site.display_name"),
    'label_req' => true])
</div>

@include('admin.layouts.permissions.form_permisions',[
'groupedPermissions' => $groupedPermissions
])




@include("admin.layouts.forms.footer")
@include('admin.layouts.forms.close')
</div>
@endsection
@section('jsFiles')
@include('admin.layouts.permissions.script_permission')
@endsection