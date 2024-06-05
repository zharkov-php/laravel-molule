<?php

namespace Modules\User\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Modules\Order\Entities\Order;
use Modules\User\Database\factories\UserFactory;

class User extends Model
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
