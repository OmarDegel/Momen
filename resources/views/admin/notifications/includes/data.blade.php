<tr>
    <td class="text-lg-center">{{ $notification->user->name }}</td>
    <td class="text-lg-center">{{ $notification->user->email }}</td>
    <td class="text-lg-center">{{ $notification->nameLang() }}</td>
    <td class="text-lg-center">{{ $notification->contentLang() }}</td>
    <td class="text-lg-center">{{ formatDate($notification->created_at) }}</td>
    <td class="text-lg-center">{{ formatDate($notification->read_at) }}</td>
    @include('admin.layouts.tables.actions', [
        'model' => 'notifications',
        'show' => true,
        'item' => $notification,
    ])
</tr>
