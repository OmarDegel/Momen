<?php

namespace App\Http\Controllers\Api;

use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CouponResource;
use App\Http\Resources\CouponCollection;

class CouponController extends MainController
{
    public function index()
    {
        $coupons = Coupon::validCoupons()->paginate($this->perPage);
        return $this->sendDataCollection(new CouponCollection($coupons));
    }

    public function show($id)
    {
        $coupon = Coupon::validCoupons()->find($id);
        if (!$coupon) {
            return $this->messageError(__('api.coupon_not_found'));
        }
        return $this->sendData(new CouponResource($coupon));
    }
}
