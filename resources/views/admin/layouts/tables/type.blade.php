<a class="btn-width {{ $btn_class ?? 'success' }} ti ti-{{ $fa_class ?? 'printer' }}" href="{{ route("admin.$table.$type",$id) }}">
    <span>{{ $value ?? '' }}</span>
</a>
