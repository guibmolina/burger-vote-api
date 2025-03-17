<?php

declare(strict_types= 1);

namespace Repositories;

use App\Models\Order;

class OrderRepository
{
    public function firstOrCreateOrder(string $code ): Order
    {
        try {
            return Order::firstOrCreate(["code"=> $code]);
        } catch (\Exception $e) {
            throw new \Exception("Failed to create Order");
        }
    }

    public function registerVote(int $orderId): void
    {
        $order = Order::findOrFail($orderId);
        $order->voted = true;
        $order->save();
    }
}