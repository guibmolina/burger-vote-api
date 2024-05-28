<?php

declare(strict_types=1);

namespace Services;

use Exception;
use Repositories\BurgerVoteRepository;

class BurgerVoteService
{
    public function __construct(private BurgerVoteRepository $repository)
    {}

    public function vote(int $burgerVoteId): void
    {
        try {
            $this->repository->vote($burgerVoteId);
        } catch (Exception $e) {
            throw new Exception("Vote error");
        }
    }

    public function list(): array
    {
        return $this->repository->list();
    }
}
