<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Dashboard\MainController;
use App\Http\Requests\dashboard\CouponRequest;

class CouponController extends MainController
{
    public function __construct()
    {
        parent::__construct();
        $this->setClass('coupons');
    }
    public function index()
    {
        $coupons = Coupon::paginate($this->perPage);
        return view('admin.coupons.index', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.coupons.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CouponRequest $request)
    {
        $coupon = Coupon::create($request->all());
        return redirect()->route('dashboard.coupons.index')->with('success', __('site.coupon_created_successfully'));
    }




    public function edit(string $id)
    {
        $coupon = Coupon::findOrFail($id);
        return view('admin.coupons.edit', compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $coupon = Coupon::findOrFail($id);
        $coupon->update($request->all());
        return redirect()->route('dashboard.coupons.index')->with('success', __('site.coupon_updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
}
