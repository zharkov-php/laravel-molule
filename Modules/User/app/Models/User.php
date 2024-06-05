<?php

namespace Modules\User\app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Modules\Order\app\Models\Order;
use Modules\User\Database\factories\UserFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use Notifiable;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['*'];

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
    protected static function newFactory(): UserFactory
    {
        return UserFactory::new();
    }
}
