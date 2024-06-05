<?php

namespace App\Http\Controllers;

use App\Http\Requests\PurchaseRequest;
use Illuminate\Http\JsonResponse;
use Modules\Order\app\Http\Services\OrderService;

class PurchaseController extends Controller
{
    protected OrderService $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function purchase(PurchaseRequest $request): JsonResponse
    {
        $order = $this->orderService->createOrder(
            $request->product_id,
            $request->quantity,
            auth()->id()
        );

        return response()->json($order, 200);
    }
}
