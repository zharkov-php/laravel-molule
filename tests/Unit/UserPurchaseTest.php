<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Modules\Order\app\Models\Order;
use Modules\Product\app\Models\Product;
use Modules\User\app\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;


class UserPurchaseTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    public function test_user_can_purchase_a_product_and_create_an_order()
    {
        // make user
        $user = User::factory()->create();

        // make product
        $product = Product::factory()->create([
            'name' => 'Test Product',
            'price' => 100,
            'status' => 'available', // add status
        ]);

        // Симулюємо покупку продукту
        $response = $this->actingAs($user)->post('/purchase', [
            'product_id' => $product->id,
            'quantity' => 1,
        ]);

        // check status
        $response->assertStatus(200);

        // check order
        $order = Order::where('user_id', $user->id)->latest()->first();
        $this->assertNotNull($order);
        $this->assertEquals($product->id, $order->product_id);
        $this->assertEquals(1, $order->quantity);
        $this->assertEquals(100, $order->total_price); // check total price

        // change status
        $order->status = 'purchased';
        $order->save();

        // check to change status
        $this->assertEquals('purchased', $order->status);
    }
}

