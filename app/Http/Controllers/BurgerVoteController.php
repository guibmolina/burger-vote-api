<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Services\BurgerVoteService;

class BurgerVoteController extends Controller
{
    public function __construct(public BurgerVoteService $service)
    {
    }

    public function vote(Request $request): JsonResponse
    {
        $request->validate(
            [
                'burger_vote_id' => 'required|exists:burger_votes,id',
            ]
        );

        $order = Auth::user();
        try {
            $this->service->vote($request->burger_vote_id, $order);
        } catch (\DomainException $de) {
            return response()->json(['message'=> $de->getMessage()], 400);
        } catch (\Throwable $th) {
            return response()->json(['message'=> 'internal error'], 500);
        }

        return response()->json();
    }

    public function list(): JsonResponse
    {
        try {
            return response()->json($this->service->list());
        } catch (\Throwable $th) {
            return response()->json(['message'=> 'internal error'], 500);
        }
    }
}
