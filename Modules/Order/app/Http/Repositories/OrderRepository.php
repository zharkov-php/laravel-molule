<?php

namespace Modules\Order\app\Http\Repositories;

use Modules\Order\app\Models\Order;

class OrderRepository
{
    /**
     * @param $data
     * @return mixed
     */
    public function createOrder($data): mixed
    {
        return Order::create($data);
    }
}
