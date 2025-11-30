<?php

namespace App\Http\Controllers\Dashboard;

use App\Enums\StatusOrderItemReturnEnum;
use Illuminate\Http\Request;
use App\Models\OrderItemReturn;

class OrderItemReturnController extends MainController
{
    public function __construct()
    {
        parent::__construct();
        $this->setClass('orderItemReturns');
    }
    public function index()
    {
        $relations = ['user', 'order', 'orderItem.product', 'reason', 'coupon'];
        $orderItemReturns = OrderItemReturn::with($relations)->paginate($this->perPage);
        $transactionsStatuses = collect(StatusOrderItemReturnEnum::cases())
            ->mapWithKeys(fn($status) => [$status->value => $status->label()])
            ->toArray();
        return view('admin.orderItemReturns.index', compact('orderItemReturns', 'transactionsStatuses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = ['user', 'order', 'orderItem', 'reason', 'coupon',  'statuses'];
        $orderItemReturn = OrderItemReturn::with($data)->findOrFail($id);
        
        return view('admin.orderItemReturns.show', compact('orderItemReturn'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
