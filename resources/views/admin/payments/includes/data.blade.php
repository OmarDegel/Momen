<tr>
    <td class="text-lg-center">{{ $payment->nameLang() }}</td>
    {{-- <td class="text-lg-center">{{ $payment->type }}</td> --}}
    
    {{-- active --}}
    @include('admin.layouts.tables.active', [
    "model" => "payments",
    "item" => $payment,
    "param" => "payment"
    ])



    {{-- action --}}
    @include('admin.layouts.tables.actions', [
    "model" => "payments",
    "edit" => true,
    "show" => true,
    "delete" => true,
    "item" => $payment,
    ])
</tr>

@include('admin.layouts.modals.delete', [
"id" => $payment->id,
"main_name" => "dashboard.payments",
"name" => "payment",
"foreDelete" => $foreDelete ?? false,
])
