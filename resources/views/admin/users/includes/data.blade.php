<tr>
    <td class="text-lg-center">
        {{ $user->email }}
    </td>
    <td class="text-lg-center">{{ $user->name_first }} {{ $user->name_last }}</td>
    <td class="text-lg-center">{{ $user->phone }}</td>
    <td class="text-lg-center">{{ __('site.'.$user->type) }}</td>
    @include('admin.layouts.tables.active', [
    "model" => "users",
    "item" => $user,
    "param" => "user"
    ])

    {{-- action --}}
    @include('admin.layouts.tables.actions', [
    "model" => "users",
    "edit" => true,
    "delete" => true,
    "show" => true,
    "item" => $user,
    ])
</tr>

@include('admin.layouts.modals.delete', [
"id" => $user->id,
"main_name" => "dashboard.users",
"name" => "user",
"foreDelete" => $foreDelete ?? false,
])