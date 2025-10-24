<tr>
    <td class="text-lg-center">{{ $contact->name?? __("site.null") }}</td>
    <td class="text-lg-center">{{ $contact->phone?? __("site.null") }}</td>
    <td class="text-lg-center">{{ $contact->title?? __("site.null") }}</td>
    <td class="text-lg-center">{{ $contact->type?? __("site.null") }}</td>
    <td class="text-lg-center">{{ $contact->created_at->diffForHumans() }}</td>

    {{-- active --}}
    @include('admin.layouts.tables.active', [
        'model' => 'contacts',
        'item' => $contact,
        'param' => 'contact',
    ])
    {{-- seen --}}
    @include('admin.layouts.tables.seen', [
    'model' => 'contacts',
    'item' => $contact,
    'param' => 'contact',
    ])



    {{-- action --}}
    @include('admin.layouts.tables.actions', [
    'model' => 'contacts',
    'show' => true,
    'item' => $contact,
    ])
</tr>