<tr>
    <td class="text-lg-center"><a
            href="{{ route('dashboard.users.show', ['user' => $favorite->user->id]) }}">{{ $favorite->user->name }}</a>
    </td>
    <td class="text-lg-center"><a
            href="{{ route('dashboard.products.show', ['product' => $favorite->product->id]) }}">{{ $favorite->product->nameLang() }}</a>
    </td>
    @php
        $function = $function ?? 'active';
    @endphp


    <td class="text-lg-center">
        <button type="button" class="btn {{ $favorite->active ? 'btn-success' : 'btn-danger' }} waves-effect waves-light"
            data-id="{{ $favorite->id }}">
            <i class="fa-solid {{ $item->active ? 'fa-check' : 'fa-circle-xmark' }}"></i>
        </button>

    </td>


</tr>
