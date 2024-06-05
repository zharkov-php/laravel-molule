<?php

namespace Modules\Order\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Order\Database\factories\OrderFactory;
use Modules\Product\app\Models\Product;
use Modules\User\app\Models\User;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'total_price',
        'status',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
    protected static function newFactory(): OrderFactory
    {
        return OrderFactory::new();
    }

    public function setTotalPriceAttribute($value): void
    {
        $this->attributes['total_price'] = $this->product->price * $this->attributes['quantity'];
    }
}
