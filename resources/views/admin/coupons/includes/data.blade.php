<tr>
    <td class="text-lg-center">{{ $coupon->nameLang() }}</td>
    <td class="text-lg-center">{{ $coupon->code }}</td>
    <td class="text-lg-center">{{ __("'site'.$coupon->type") }}</td>
    <td class="text-lg-center">{{ $coupon->type == 'percentage' ? $coupon->discount . '%' : $coupon->discount }}</td>
    <td class="text-lg-center">{{ $coupon->type == 'percentage' ? $coupon->max_discount . '%' : $coupon->max_discount }}
    </td>
    <td class="text-lg-center">{{ $coupon->min_order ?? __('site.null') }}</td>
    <td class="text-lg-center">{{ $coupon->date_start }} - {{ $coupon->date_expire }}</td>


    {{-- image --}}

    {{-- active --}}
    @include('admin.layouts.tables.active', [
        'model' => 'coupons',
        'item' => $coupon,
        'param' => 'coupon',
    ])



    {{-- action --}}
    @include('admin.layouts.tables.actions', [
        'model' => 'coupons',
        'edit' => true,
        'item' => $coupon,
    ])
</tr>

@include('admin.layouts.modals.delete', [
    'id' => $coupon->id,
    'main_name' => 'dashboard.coupons',
    'name' => 'coupon',
    'foreDelete' => $foreDelete ?? false,
])
