<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\City;
use App\Models\User;
use App\Models\Order;
use App\Models\Region;
use App\Models\Payment;
use App\Models\DeliveryTime;
use Illuminate\Http\Request;
use App\Enums\StatusOrderEnum;
use App\Helpers\StatusOrderHelper;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Dashboard\MainController;

class OrderController extends MainController
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        parent::__construct();
        $this->setClass('orders');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function index(Request $request)
    {
        $deliveryTimes = DeliveryTime::get()->mapWithKeys(function ($deliveryTime) {
            return [$deliveryTime->id => $deliveryTime->nameLang()];
        })->toArray();
        $payments = Payment::get()->mapWithKeys(function ($payment) {
            return [$payment->id => $payment->nameLang()];
        })->toArray();
        $deliverys = User::where('type', 'delivery')->get()->mapWithKeys(function ($delivery) {
            return [$delivery->id => $delivery->name];
        })->toArray();
        $cities = City::get()->mapWithKeys(function ($city) {
            return [$city->id => $city->nameLang()];
        })->toArray();
        $regions = Region::get()->mapWithKeys(function ($region) {
            return [$region->id => $region->nameLang()];
        })->toArray();
        $orders = Order::with("user", "orderItems", "address")->filter($request)->paginate($this->perPage);
        $transactionsStatuses = collect(StatusOrderEnum::cases())
            ->mapWithKeys(fn($status) => [$status->value => $status->label()])
            ->toArray();
        return view('admin.orders.index', get_defined_vars());
    }




    public function show(string $id)
    {
        $data = ['user', 'address', 'delivery', 'payment', 'deliveryTime', 'orderItems.product', 'orderStatus'];
        $order = Order::with($data)->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }
}
