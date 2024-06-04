<?php

// Modules/User/Entities/User.php

namespace Modules\User\Entities;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Modules\Order\Entities\Order;

class User extends Authenticatable
{
    use Notifiable;

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}

