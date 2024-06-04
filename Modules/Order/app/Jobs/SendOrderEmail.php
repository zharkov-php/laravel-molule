<?php

namespace Modules\Order\Jobs;

use Modules\Order\Entities\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Modules\Order\Mail\OrderShipped;

class SendOrderEmail implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    protected Order $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function handle(): void
    {
        Mail::to($this->order->user->email)->send(new OrderShipped($this->order));
    }
}

