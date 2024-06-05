<?php

namespace Modules\Product\app\Http\Repositories;

use Modules\Product\app\Models\Product;

class ProductRepository
{
    /**
     * @param  int  $productId
     * @return mixed
     */
    public function findProductById(int $productId): mixed
    {
        return Product::findOrFail($productId);
    }
}
