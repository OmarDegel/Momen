@if($active == 0)
<a class="{{ $ajax_class ?? '' }}  {{ $error_class   ?? 'danger' }}"   data-id="{{ $id }}"  data-{{ $data_status ?? 'status' }}="{{ $error_status ?? 1 }}" ><i class="fa-solid fa-circle-xmark" style="color:#dc3535; font-size:1.5rem"></i>
</a>
@else
<a class=" @if(!isset($model_is_read)) {{ $ajax_class ?? '' }} @endif  {{ $success_class ?? 'success' }}"  data-id="{{ $id }}"  data-{{ $data_status ?? 'status' }}="{{ $success_status ?? 0 }}" ><i class="fa-solid fa-circle-check" style="color: #19873a; font-size:1.5rem"></i>
</a>
@endif
