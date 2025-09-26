<tr>
    
    <td class="text-lg-center">{{ $role->name }}</td>
    <td class="text-lg-center">{{ $role->display_name }}</td>

    {{-- action --}}
    @include('admin.layouts.tables.actions', [
        'model' => 'roles',
        'edit' => true,
        'delete' => true,
        "show" => true,
        'item' => $role,
    ])
</tr>

@include('admin.layouts.modals.delete', [
    'id' => $role->id,
    'main_name' => 'dashboard.roles',
    'name' => 'role',
    'foreDelete' => $foreDelete ?? false,
])
