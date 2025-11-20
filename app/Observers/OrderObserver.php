<?php

namespace App\Observers;

use App\Models\Order;
use App\Models\OrderStatus;
use Illuminate\Support\Facades\Auth;

class OrderObserver
{
    /**
     * Handle the Order "created" event.
     */
    public function created(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "updated" event.
     */
    public function updated(Order $order): void
    {
        if ($order->isDirty('status')) {
            OrderStatus::create([
                'order_id' => $order->id,
                'status' => $order->status,
            ]);
            if ($order->status == 'cancelled') {
                $order->withoutEvents(function () use ($order) {
                    $order->cancel_by = Auth::id();
                    $order->cancel_date = now();
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
