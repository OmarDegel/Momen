<?php

namespace App\Observers;

use App\Models\OrderItemReturn;
use App\Models\OrderItemReturnStatus;
use Illuminate\Support\Facades\Auth;

class OrderItemReturnObserver
{
    public function updated(OrderItemReturn $orderItemReturn): void
    {
        if ($orderItemReturn->isDirty('status')) {
            OrderItemReturnStatus::create([
                'order_item_return_id' => $orderItemReturn->id,
                'status' => $orderItemReturn->status,
            ]);

            $orderItemReturn->withoutEvents(function () use ($orderItemReturn) {
                $status = $orderItemReturn->status;
                $userId = Auth::id();

                if ($status === 'delivered') {
                    $orderItemReturn->returned_at = now();
                } elseif ($status === 'approved') {
                    $orderItemReturn->approved_by = $userId;
                    $orderItemReturn->approved_at = now();
                } elseif ($status === 'rejected') {
                    $orderItemReturn->rejected_by = $userId;
                    $orderItemReturn->rejected_at = now();
                }

                $orderItemReturn->save();
            });
        }
    }
}
