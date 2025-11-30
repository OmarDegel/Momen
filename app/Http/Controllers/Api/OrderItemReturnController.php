<?php

namespace App\Http\Controllers\Api;

use id;
use Illuminate\Http\Request;
use App\Models\OrderItemReturn;
use App\Http\Controllers\Controller;
use App\Http\Resources\OrderItemReturnResource;
use App\Http\Requests\Api\OrderItemReturnRequest;
use App\Http\Resources\OrderItemReturnCollection;
use App\Services\OrderItemReturnService;

class OrderItemReturnController extends MainController
{
    protected $itemReturnService;
    public function __construct(OrderItemReturnService $itemReturnService)
    {
        $this->itemReturnService = $itemReturnService;
    }
    public function index()
    {
        $auth = Auth()->guard('api')->user();
        $orderItemReturns = $auth->orderItemReturns()->with('orderItem.product', 'orderItem.productChild')->paginate($this->perPage);
        return $this->sendDataCollection(new OrderItemReturnCollection($orderItemReturns));
    }
    public function create(OrderItemReturnRequest $request)
    {
        try {
            $user = auth()->guard('api')->user();
            $this->itemReturnService->canReturn($request->order_item_id, $request->amount);
            $orderItemReturn = $this->itemReturnService->handleReturn($request->all(), $user);
        } catch (\Throwable $th) {
            return $this->messageError($th->getMessage());
        }
        return $this->sendData(new OrderItemReturnResource($orderItemReturn));
    }
    public function cancel(string $id)
    {
        
        if ($this->itemReturnService->canCancel($id) !== true) {
            return $this->messageError(__('api.order_item_return_not_found'));
        }
        
        return $this->messageSuccess(__('api.order_item_return_cancel_success'));
    }
}
