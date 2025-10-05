<tr>
    <td class="text-lg-center">{{ $page->nameLang() }}</td>
    <td class="text-lg-center">{{ $page->order_id?? 0 }}</td>
    {{-- image --}}
    <td class="text-lg-center">
        @if ($page->image)
        <img src="{{ asset( $page->image) }}" alt="{{ $page->nameLang() }}" class="rounded-circle" width="50"
            height="50">
        @else
        <img src="{{ asset('images/default.png') }}" alt="{{ $page->nameLang() }}" class="rounded-circle" width="50"
            height="50">
        @endif
    </td>
    {{-- active --}}
    @include('admin.layouts.tables.active', [
    "model" => "pages",
    "item" => $page,
    "param" => "page"
    ])



    {{-- action --}}
    @include('admin.layouts.tables.actions', [
    "model" => "pages",
    "edit" => true,
    "show" => true,
    "delete" => true,
    "item" => $page,
    ])
</tr>

@include('admin.layouts.modals.delete', [
"id" => $page->id,
"main_name" => "dashboard.pages",
"name" => "page",
"foreDelete" => $foreDelete ?? false,
])
