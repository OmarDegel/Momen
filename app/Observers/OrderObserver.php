<?php

namespace App\Observers;

use App\Models\Order;
use App\Models\Coupon;
use App\Models\OrderStatus;
use App\Enums\StatusOrderEnum;
use Illuminate\Support\Facades\Auth;

class OrderObserver
{
    protected function getAuthUserData()
    {
        foreach (['api', 'web'] as $guard) {
            if (Auth::guard($guard)->check()) {
                return [
                    'id'   => Auth::guard($guard)->id(),
                    'type' => $guard
                ];
            }
        }
        return ['id' => null, 'type' => null];
    }
    public function created(Order $order)
    {
        $auth = $this->getAuthUserData();

        OrderStatus::create([
            'order_id'  => $order->id,
            'status'    => StatusOrderEnum::Request->value,
            'user_id'   => $auth['id'],
        ]);

        if ($order->coupon_id != null) {
            $coupon = Coupon::find($order->coupon_id);
            $coupon->update([
                'use_count' => ($coupon->use_count + 1),
            ]);
        }
    }
    /**
     * Handle the Order "updated" event.
     */
    public function updated(Order $order): void
    {
        if ($order->isDirty('status')) {
            $auth = $this->getAuthUserData();

            OrderStatus::create([
                'order_id'  => $order->id,
                'status'    => $order->status,
                'user_id'   => $auth['id'],
            ]);
            if ($order->status == StatusOrderEnum::Canceled->value) {
                $order->withoutEvents(function () use ($order) {
                    $order->cancel_by = Auth::id();
                    $order->cancel_date = now();
                    $order->save();
                });
            }
            if ($order->status == StatusOrderEnum::Delivered->value) {
                $order->withoutEvents(function () use ($order) {
                    $order->delivered_by = Auth::id();
                    $order->delivered_date = now();
                    $order->is_paid = 1;
                    $order->total_paid = $order->total;
                    $order->remaining = 0;
                    $order->save();
                });
            }
        }
    }

    /**
     * Handle the Order "deleted" event.
     */
    public function deleted(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "restored" event.
     */
    public function restored(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "force deleted" event.
     */
    public function forceDeleted(Order $order): void
    {
        //
    }
}
