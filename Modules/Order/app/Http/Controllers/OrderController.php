<?php

namespace Modules\Order\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\Order\Entities\Order;

class OrderController extends Controller
{
    public function index(): Collection
    {
        return Order::all();
    }

    public function show($id)
    {
        return Order::findOrFail($id);
    }

    public function store(
        Request $request,
    ): JsonResponse {
        $order = Order::create(
            $request->all(),
        );

        SendOrderEmail::dispatch(
            $order,
        );

        return response()
            ->json(
                $order,
                201
            );
    }
}
