<?php

namespace Modules\Product\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Modules\Product\Entities\Product;

class ProductController extends Controller
{
    public function index(): Collection
    {
        return Product::all();
    }

    public function show($id)
    {
        return Product::findOrFail($id);
    }
}
