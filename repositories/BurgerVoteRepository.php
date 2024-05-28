<?php

declare(strict_types= 1);

namespace Repositories;

use App\Models\BurgerVote;

class BurgerVoteRepository
{
    public function vote(int $burgerVoteId): void
    {
        BurgerVote::where("id", $burgerVoteId)->increment("votes");
    }

    public function list(): array
    {
       return BurgerVote::orderBy("votes", "desc")->get()->toArray();
    }
}