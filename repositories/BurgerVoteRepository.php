<?php

declare(strict_types= 1);

namespace Repositories;

use App\Models\BurgerVote;

class BurgerVoteRepository
{
    public function vote(int $burgerVoteId): BurgerVote
    {
        BurgerVote::where("id", $burgerVoteId)->increment("votes");
        return BurgerVote::find($burgerVoteId);
    }

    public function list(): array
    {
        return BurgerVote::orderBy("votes", "desc")->get()->toArray();
    }
}