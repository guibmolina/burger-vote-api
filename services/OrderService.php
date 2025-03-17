<?php

declare(strict_types=1);

namespace Services;

use App\Models\Order;
use Repositories\OrderRepository;

class OrderService
{
    public function __construct(private OrderRepository $repository)
    {
    }

    public function register(string $orderCode): string
    {
        $order = $this->repository->firstOrCreateOrder($orderCode);

        if ($order->voted) {
            throw new \DomainException("This order id already voted");
        }

        return $this->authOrder($order);
    }

    private function authOrder(Order $order): string
    {
        if ($order->tokens()->count() > 1) {
            $order->tokens()->delete();
        }

        return $order->createToken($order->code)->plainTextToken;
    }

    public function registerVote(int $orderId): void
    {
        $this->repository->registerVote($orderId);
    }
}