<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\City;
use App\Models\Page;
use App\Models\Size;
use App\Models\User;
use App\Models\Brand;
use App\Models\Order;
use App\Models\Coupon;
use App\Models\Region;
use App\Models\Review;
use App\Models\Contact;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Category;
use App\Models\OrderStatus;
use App\Traits\ToggleTrait;
use App\Models\DeliveryTime;
use Illuminate\Http\Request;
use App\Enums\StatusOrderEnum;
use App\Helpers\StatusOrderHelper;
use App\Http\Controllers\Controller;
use App\Enums\StatusOrderItemReturnEnum;
use App\Helpers\StatusOrderItemsReturnHelper;
use App\Models\OrderItemReturn;

class AjaxController extends Controller
{
    use ToggleTrait;

    public function categoryActive($id)
    {
        $category = Category::withTrashed()->findOrFail($id);
        return $this->active($category);
    }
    public function sizeActive($id)
    {
        $size = Size::withTrashed()->findOrFail($id);
        return $this->active($size);
    }
    public function cityActive($id)
    {
        $city = City::withTrashed()->findOrFail($id);
        return $this->active($city);
    }
    public function regionActive($id)
    {
        $region = Region::withTrashed()->findOrFail($id);
        return $this->active($region);
    }
    public function pageActive($id)
    {
        $page = Page::withTrashed()->findOrFail($id);
        return $this->active($page);
    }
    public function contactActive($id)
    {
        $contact = Contact::withTrashed()->findOrFail($id);
        return $this->active($contact);
    }
    public function brandActive($id)
    {
        $brand = Brand::withTrashed()->findOrFail($id);
        return $this->active($brand);
    }
    public function seen(Contact $contact)
    {
        $contact->is_read = true;
        $contact->save();
        return response()->json([
            'success' => true,
            'is_read' => $contact->is_read,
        ]);
    }
    public function productActive($id)
    {
        $product = Product::withTrashed()->findOrFail($id);
        return $this->active($product);
    }
    public function feature($id)
    {
        $product = Product::withTrashed()->findOrFail($id);

        $product->update([
            'feature' => ! ($product->feature),
        ]);
        return response()->json([
            'success' => true,
            'active' => $product->feature,
        ]);
    }

    public function returned($id)
    {
        $product = Product::withTrashed()->findOrFail($id);
        $product->update([
            'is_returned' => ! ($product->is_returned),
        ]);
        // dd($product->is_returned);  
        return response()->json([
            'success' => true,
            'active' => $product->is_returned,
        ]);
    }
    public function reviewActive($id)
    {
        $review = Review::withTrashed()->findOrFail($id);
        return $this->active($review);
    }
    public function userActive($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        return $this->active($user);
    }
    public function paymentActive($id)
    {
        $payment = Payment::withTrashed()->findOrFail($id);
        return $this->active($payment);
    }
    public function couponActive($id)
    {
        $coupon = Coupon::withTrashed()->findOrFail($id);
        return $this->active($coupon);
    }
    public function deliveryTimeActive($id)
    {
        $delivery_time = DeliveryTime::withTrashed()->findOrFail($id);
        return $this->active($delivery_time);
    }
   

    public function changeStatus(Request $request, Order $order)
    {
        $newStatus = StatusOrderEnum::from($request->status);

        $order->status = $newStatus;
        $order->save();
        OrderStatus::create([
            'order_id' => $order->id,
            'status_id' => $newStatus->value
        ]);

        $availableTransitions = collect(StatusOrderHelper::getAvailableTransitions($newStatus))
            ->mapWithKeys(fn($status) => [$status->value => $status->label()])
            ->toArray();


        return response()->json([
            'success' => true,
            'message' => 'Status updated.',
            'transitions' => $availableTransitions,
            'current' => $newStatus->value
        ]);
    }
    public function changeItemStatus(Request $request, OrderItemReturn $item)
    {
        
        $newStatus = StatusOrderItemReturnEnum::from($request->status);

        $item->status = $newStatus;
        $item->save();
        
        
        $availableTransitions = collect(StatusOrderItemsReturnHelper::getAvailableTransitions($newStatus))
            ->mapWithKeys(fn($status) => [$status->value => $status->label()])
            ->toArray();


        return response()->json([
            'success' => true,
            'message' => 'Status updated.',
            'transitions' => $availableTransitions,
            'current' => $newStatus->value
        ]);
    }
}
