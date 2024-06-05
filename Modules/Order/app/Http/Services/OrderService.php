<?php

namespace Modules\Order\app\Http\Services;

use Modules\Order\app\Http\Repositories\OrderRepository;
use Modules\Product\app\Http\Repositories\ProductRepository;

class OrderService
{
    private ProductRepository $productRepository;
    private OrderRepository $orderRepository;

    public function __construct(
        ProductRepository $productRepository,
        OrderRepository $orderRepository,
    )
    {
        $this->productRepository = $productRepository;
        $this->orderRepository = $orderRepository;
    }

    /**
     * @param $productId
     * @param $quantity
     * @param $authUserId
     * @return mixed
     */
    public function createOrder($productId, $quantity, $authUserId): mixed
    {
        $product = $this->productRepository->findProductById($productId);
        $totalPrice = $product->price * $quantity;

        $data = [
            'user_id' => $authUserId,
            'product_id' => $product->id,
            'quantity' => $quantity,
            'total_price' => $totalPrice,
            'status' => 'pending',
        ];

        return $this->orderRepository->createOrder($data);
    }

}
