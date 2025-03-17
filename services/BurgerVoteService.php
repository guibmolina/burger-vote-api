<?php

declare(strict_types=1);

namespace Services;

use App\Events\BurgerVoted;
use App\Models\Order;
use Exception;
use Repositories\BurgerVoteRepository;

class BurgerVoteService
{
    public function __construct(private BurgerVoteRepository $repository, private OrderService $orderService)
    {
    }

    public function vote(int $burgerVoteId, Order $order): void
    {
        if ($order->voted) {
            throw new \DomainException("Order already voted");
        }
        try {
            $burgerVote = $this->repository->vote($burgerVoteId);
            $this->orderService->registerVote($order->id);
            broadcast(new BurgerVoted($burgerVote));
        } catch (Exception $e) {
            throw new Exception("Vote error");
        }
    }

    public function list(): array
    {
        return $this->repository->list();
    }
}
