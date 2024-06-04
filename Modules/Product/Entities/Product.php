<?php

// Modules/Product/Entities/Product.php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Order\Entities\Order;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
    ];

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}

