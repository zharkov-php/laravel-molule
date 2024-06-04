<?php

namespace Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Modules\User\Entities\User;

class UserController extends Controller
{
    public function index(): Collection
    {
        return User::all();
    }

    public function show($id)
    {
        return User::findOrFail($id);
    }
}
