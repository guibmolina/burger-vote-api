<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Services\BurgerVoteService;

class BurgerVoteController extends Controller
{
    public function __construct(public BurgerVoteService $service)
    {}

    public function vote(Request $request): void
    {
        $request->validate([
            'burger_vote_id' => 'required|exists:burger_votes,id',
        ]);

        $this->service->vote($request->burger_vote_id);
    }

    public function list(): JsonResponse
    {
        return response()->json($this->service->list());
    }
}
